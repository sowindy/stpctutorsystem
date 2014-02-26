<?php
/**
 * @author zf
 */
define("INC",true);
class StuAction extends BaseAction{
    
    //如果user type != 1 ，即不为学生，或者未登录，均无法访问
    private function tologin(){
        $this->uid == NULL && $this->error("您还没有登录，请先登录！");
        $user_mysql = M('user');
        $type = $user_mysql->where(array('id'=>  $this->uid))->getField('type');
        if($type != 1){
            exit('No Permission! to login');
        }
    }
    
    public function test(){
        header("Content-Type=text/html;charset=utf-8");
        print_arr($_SESSION);
    }

        //默认页面，展示自己的个人信息、导师、实习单位
    //根据登陆时间判断，自上次登陆后有更新的导师与企业单位信息
    //如果有导师了，首页展示导师信息
    public function index(){
        $this->tologin();
        $this->assign('title',学生后台管理首页);
        $user_mysql = M('user');
        
        //个人信息
        $stuinfo = $user_mysql->where(array('id'=>$this->uid))->find();
        $this->assign('stuinfo',$stuinfo);

        $this->display();
    }


    //修改个人信息界面
    public function info(){
        $this->tologin();
        $this->assign('title',学生信息更新/修改);
        $user_mysql = M('user');
        $stuinfo = $user_mysql->where(array('id'=>$this->uid))->find();
        $this->assign('stuinfo',$stuinfo);
        
        $this->display();
    }
    public function infohandler(){
        $data['id'] = $this->uid;
        $this->post['stu_number'] == ''|| $data['stu_number'] = $this->post['stu_number'];
        $this->post['stu_name'] == ''|| $data['stu_name'] = $this->post['stu_name'];
        $this->post['stu_sex'] == ''|| $data['stu_sex'] = $this->post['stu_sex'];
        $this->post['stu_phone'] == ''|| $data['stu_phone'] = $this->post['stu_phone'];
        $this->post['stu_email'] == ''|| $data['stu_email'] = $this->post['stu_email'];
        $this->post['stu_QQ'] == ''|| $data['stu_QQ'] = $this->post['stu_QQ'];
        $this->post['stu_workplace'] == ''|| $data['stu_workplace'] = $this->post['stu_workplace'];
        $this->post['stu_studyexperience'] == ''|| $data['stu_studyexperience'] = $this->post['stu_studyexperience'];
        $this->post['stu_workexperience'] == ''|| $data['stu_workexperience'] = $this->post['stu_workexperience'];
        $this->post['stu_honor'] == ''|| $data['stu_honor'] = $this->post['stu_honor'];
        $this->post['stu_selfvalue'] == ''|| $data['stu_selfvalue'] = $this->post['stu_selfvalue'];
        $user_mysql = M('user');
        if($user_mysql->save($data)){
            echo 'succsss';
        }
        else{
            echo 'error';
        }
        print_arr($data);
    }

    //导师列表
    //含有选择导师功能
    //学生最多三个志愿，如果满三个志愿，其余导师均为不可操作状态
    //学生不可修改自己的志愿，此功能需要联系管理员
    //如果已经选择这位导师，也为不可操作
    //学生如果进入毕业名单，不可进行所有操作，需联系管理员
    public function tutor(){
        $this->tologin();
        //学生是否已经毕业
        $graduate_mysql = M('graduate');
        !$graduate_mysql->where(array('stu_id'=>  $this->uid))->find() || exit('You have Graduate!');
        
        //判断学生的志愿人数
        $stututor_mysql = M('stututor');
        $all_tutor_id = $stututor_mysql->where(array('stu_id'=>  $this->uid))->select();
        $tutor_num = count($all_tutor_id);
        //此版本Thinkphp中，不能用getField方法返回数组,有下面方法提到
        $temp = array();
        foreach ($all_tutor_id as $one){
            array_push($temp, $one['tutor_id']);
        }

        
        //列出所有发布了招收学生的老师
        $tutor_mysql = M('tutor');
        $all_publish_tutor = $tutor_mysql->where(array('status'=>1))->select();
        
        //判断此导师是否可进行操作
        if($all_publish_tutor){
            foreach ($all_publish_tutor as &$one){
                if($tutor_num >= 3 || in_array($one['id'], $temp) || count($stututor_mysql->where(array('tutor_id'=>$one['id']))->select()) >=  C('MAX_STU_NUM')){
                    $one['operate'] = 0;
                }else{
                    $one['operate'] = 1;
                }
            }
        }
        
        $this->assign('all_publish_tutor',$all_publish_tutor);
        
        $this->display();
    }
    
    //选择导师的结果操作
    //需要判断学生选择导师的人数，超过3个无法操作
    //需要判断导师的信息是否处于发布状态，如果处于发布状态
    //写入到qcs_stututor表中
    public function tutorhandler(){
        //判断学生的志愿数
        $stututor_mysql = M('stututor');
        count($stututor_mysql->where(array('stu_id'=>  $this->uid))->select()) < 3 || exit('sorry,you have already choose 3 tutors!');
        //判断是否重复提交了导师信息
        !$stututor_mysql->where(array('stu_id'=>  $this->uid,'tutor_id'=>  $this->post['tutor_id']))->find() || exit('same tutor!');
        
        //判断导师信息是否处于发布状态
        $tutor_mysql = M('tutor');
        $tutor_mysql->where(array('id'=>  $this->post['tutor_id']))->getField('status') || exit('not publish!');
        
        if($stututor_mysql->data(array('stu_id'=>  $this->uid,'tutor_id'=>  $this->post['tutor_id']))->add()){
            $this->redirect('choosetutorresult');
        }  else {
           exit('Add to Mysql Wrong');
        }
    }
    
    //选择导师的结果页面
    //显示学生申请的多有老师最后的审核信息与状态
    //status:0代表信息待审核，1代表同意，2代表拒绝；如果有一个1，其余待审核状态均变为其他
    public function choosetutorresult(){
        $stututor_mysql = M('stututor');
        $tutor_mysql = M('tutor');
        $tutor_to_choose = array();
        //如果已经审核，则吧status：0的转换成status：3
        if($stututor_mysql->where(array('stu_id'=>  $this->uid,'status'=>1))->find()){
            $result = $stututor_mysql->where(array('stu_id'=>  $this->uid))->select();
            foreach ($result as &$one){
                $result1 = $tutor_mysql->where(array('id'=>$one['tutor_id']))->find();
                if($one['status'] == 0){
                    $result1['status'] = 3;
                    $result1['mark'] = $one['mark'];
                }else{
                    $result1['status'] = $one['status'];
                    $result1['mark'] = $one['mark'];
                }
                array_push($tutor_to_choose,$result1);
            }
        }else{
            $result = $stututor_mysql->where(array('stu_id'=>  $this->uid))->select();
            foreach ($result as &$one){
                $result1 = $tutor_mysql->where(array('id'=>$one['tutor_id']))->find();
                $result1['status'] = $one['status'];
                $result1['mark'] = $one['mark'];
                array_push($tutor_to_choose,$result1);
            }
        }
        $this->assign('tutor_to_choose',$tutor_to_choose);
        $this->display();
    }
    
    //放弃申请导师
    public function canceltutor(){
        exit('You have no permision!');
    }


    //浏览实习单位
    public function practice(){
        //学生是否已经毕业
        $graduate_mysql = M('graduate');
        !$graduate_mysql->where(array('stu_id'=>  $this->uid))->find() || exit('You have Graduate!');
        
        //判断学生的志愿人数
        $stupractice_mysql = M('stupractice');
        $all_practice_id = $stupractice_mysql->where(array('stu_id'=>  $this->uid))->select();
        $practice_num = count($all_practice_id);
        //此版本Thinkphp中，不能用getField方法返回数组,有下面方法提到
        $temp = array();
        foreach ($all_practice_id as $one){
            array_push($temp, $one['practice_id']);
        }

        
        //列出所有发布了招收学生的老师
        $practice_mysql = M('practice');
        $all_publish_practice = $practice_mysql->where(array('status'=>1))->select();
        
        //user表
        $user_mysql = M('user');
        
        //判断此导师是否可进行操作
        $all_publish_practice_toassign = array();
        if($all_publish_practice){
            foreach ($all_publish_practice as $one){
                //判断user表中的type：3，不是则continue
                $user_type = $user_mysql->find($one['uid']);
                if(!$user_type){
                    exit('No Corporate!');
                }elseif($user_type['type'] != 3){
                    continue;
                }
                
                if($practice_num >= 3 || in_array($one['id'], $temp) || count($stupractice_mysql->where(array('practice_id'=>$one['id']))->select()) >= $one['num']){
                    $one['operate'] = 0;
                }else{
                    $one['operate'] = 1;
                }
                $one['corporate'] = $user_type['corporate'];
                $one['corporate_about'] = $user_type['corporate_about'];
                array_push($all_publish_practice_toassign, $one);
            }
        }
        
        $this->assign('all_publish_practice',$all_publish_practice_toassign);
        
        $this->display();
    }
    //选择实习单位的操作
    public function practicehandler(){
        //判断学生的志愿人数
        $stupractice_mysql = M('stupractice');
        count($stupractice_mysql->where(array('stu_id'=>  $this->uid))->select()) < 3 || exit('sorry,you have already choose 3 corporate!');
        //判断是否重复提交了实习信息
        !$stupractice_mysql->where(array('stu_id'=>  $this->uid,'practice_id'=>  $this->post['practice_id']))->find() || exit('same tutor!');
        
        //判断导师信息是否处于发布状态
        $practice_mysql = M('practice');
        $practice_mysql->where(array('id'=>  $this->post['practice_id']))->getField('status') || exit('not publish!');
        
        if($stupractice_mysql->data(array('stu_id'=>  $this->uid,'practice_id'=>  $this->post['practice_id']))->add()){
            $this->redirect('choosepracticeresult');
        }  else {
           exit('Add to Mysql Wrong');
        }
    }

    //选择单位的结果页面
    //显示学生申请的多有老师最后的审核信息与状态
    //status:0代表信息待审核，1代表同意，2代表拒绝；如果有一个1，其余待审核状态均变为其他
    public function choosepracticeresult(){
        $stupractice_mysql = M('stupractice');
        $user_mysql = M('user');
        $practice_mysql = M('practice');
        $practice_to_choose = array();
        //判断是否已经审核被录用,如果已经被其他公司录用，则吧status：0的转换成status：3
        if($stupractice_mysql->where(array('stu_id'=>  $this->uid,'status'=>1))->find()){
            $result = $stupractice_mysql->where(array('stu_id'=>  $this->uid))->select();
            foreach ($result as &$one){
                $result1 = $practice_mysql->where(array('id'=>$one['practice_id']))->find();
                //寻得corporate
                $corporate = $user_mysql->where(array('id'=>$result1['uid']))->getField('corporate,corporate_about');
                if($one['status'] == 0){
                    $result1['status'] = 3;
                    $result1['mark'] = $one['mark'];
                }else{
                    $result1['status'] = $one['status'];
                    $result1['mark'] = $one['mark'];
                }
                $result1['corporate'] = $corporate['corporate'];
                $result1['corporate_about'] = $corporate['corporate_about'];
                array_push($practice_to_choose,$result1);
            }
        }else{
            $result = $stupractice_mysql->where(array('stu_id'=>  $this->uid))->select();
            foreach ($result as &$one){
                $result1 = $practice_mysql->where(array('id'=>$one['practice_id']))->find();
                $result1['status'] = $one['status'];
                $result1['mark'] = $one['mark'];
                $result1['corporate'] = $user_mysql->where(array('id'=>$result1['uid']))->getField('corporate');
                array_push($practice_to_choose,$result1);
            }
        }
        $this->assign('practice_to_choose',$practice_to_choose);
        $this->display();
    }
    
    //取消志愿
    public function cancelpractice(){
        exit('No Permission!');
    }
}
?>
