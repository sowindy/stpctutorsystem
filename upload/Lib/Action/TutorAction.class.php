<?php

define("INC",true);
class TutorAction extends BaseAction{
    
    //检测身份
    private function tologin(){
        $this->uid == NULL && exit('Access Denied!');
        $user_mysql = M('user');
        $type = $user_mysql->where(array('id'=>  $this->uid))->getField('type');
        if($type != 2){
            exit('You are not a tutor');
        }
        $this->assign('num',$this->choosestunum());
    }

    //首页展示内容如下
    //1、导师个人信息
    //2、学生学生选择导师的更新信息
    public function index(){
        $this->tologin();
        $tutor_mysql = M('tutor');
        $tutorinfo = $tutor_mysql->where(array('id'=>  $this->uid))->find();
        $this->assign('tutorinfo',$tutorinfo);
        $this->display();
    }
    
    //导师信息修改界面
    public function info(){
        $this->tologin();
        $this->assign('title',导师信息更新/修改);
        $tutor_mysql = M('tutor');
        $tutor_info = $tutor_mysql->where(array('id'=>  $this->uid))->find();
        $this->assign("tutorinfo",  $tutor_info);
        $this->display();
    }
    
    public function infohandler(){
        $this->tologin();
        $tutor_mysql = M('tutor');
        if($tutor_mysql->find($this->uid)){
            if($tutor_mysql->where(array('id'=>  $this->uid))->data($this->post)->save()){
                $this->redirect('index');
            }else{
                $this->redirect('info', NULL, 2, 'no new data,or something wrong!');
            }
        }
        else{
            $temp = $this->post;
            $temp['id'] = $this->uid;
            if($tutor_mysql->data($temp)->add()){
                $this->redirect('index');
            }else{
                $this->redirect('info', NULL, 2, 'no new data,or something wrong!');
            }
        }
        
    }

    //导师发布自己招收学生的需求
    //需求发布有一个时间限制，多少天后自动取消发布【暂且取消此功能】
    public function publishinfo(){
        $this->tologin();
        $tutor_mysql = M('tutor');
        if($tutor_mysql->where(array('id'=>  $this->uid))->data(array('status'=>1))->save()){
            $this->redirect('index');
        }else{
            exit('something wrong!');
        }
    }
    //导师取消发布自己招收学生的需求
    public function cancelinfo(){
        $this->tologin();
        $tutor_mysql = M('tutor');
        if($tutor_mysql->where(array('id'=>  $this->uid))->data(array('status'=>0))->save()){
            $this->redirect('index');
        }else{
            exit('something wrong!');
        }
    }
    
    //学生申请列表
    //显示学生信息
    public function stulist(){
        $this->tologin();
        $stututor_mysql = M('stututor');
        $user_mysql = M('user');
        //获取选择此导师的学生
        $all_stu_id = $stututor_mysql->where(array('tutor_id'=> $this->uid))->field('stu_id,status')->select();
        $all_stu_info = array();
        foreach ($all_stu_id as $one){
            $result = $user_mysql->where(array('id'=>$one['stu_id']))->find();
            //判断此学生的状态，如果此老师已经选中status:1,此老师拒绝status:2,如果为0，别的老师没有选中则为status:0,别的老师已经选择了status:3
            if($one['status'] == 1|| $one['status'] == 2){
                $result['status'] = $one['status'];
            }elseif ($one['status'] == 0) {
                if($stututor_mysql->where(array('stu_id'=>$one['stu_id'],'status'=>1))->find()){
                    $result['status'] = 3;
                }else{
                    $result['status'] = 0;
                }
            }else{
                continue;
            }
            if($result){
                array_push($all_stu_info, $result);
            }
        }
        $this->assign('allstuinfo',$all_stu_info);
        $this->display();
    }
    


    //审核学生：通过、拒绝
    //如果别的老师已审核通过：显示已被审核，学生状态和拒绝后状态一样，不能操作为通过
    //导师有名额限制，只能最多通过6位导师，超过后，别的学生不可操作，在学生界面，此导师也是不可选状态
    //导师如果选择拒绝，会弹出拒绝理由，显示在学生志愿列表中
    public function choosestu(){
        $this->tologin();
        $stututor_mysql = M('stututor');
        $user_mysql = M('user');
        //筛选需要老师审核的学生
        $all_stu_id = $stututor_mysql->where(array('tutor_id'=> $this->uid))->field('stu_id,status')->select();
        $stu_num = count($stututor_mysql->where(array('tutor_id'=>  $this->uid,'status'=>1))->field('stu_id')->select());
        $to_choose = array();
        foreach ($all_stu_id as $one){
            //导师人数已满，则直接所有人不可选
            if($one['status'] == 1 || $one['status'] == 2){
                continue;
            }elseif($one['status'] == 0){
                if($stututor_mysql->where(array('stu_id'=>$one['stu_id'],'status'=>1))->find()){
                    continue;
                }else{
                    $result = $user_mysql->where(array('id'=>$one['stu_id']))->find();
                    array_push($to_choose,$result);
                }
            }
            continue;
        }
        $this->assign('allstuinfo',$to_choose);
        $this->display();
    }
    
    private function choosestunum(){
        $stututor_mysql = M('stututor');
        $user_mysql = M('user');
        //筛选需要老师审核的学生
        $all_stu_id = $stututor_mysql->where(array('tutor_id'=> $this->uid))->field('stu_id,status')->select();
        //$stu_num = count($stututor_mysql->where(array('tutor_id'=>  $this->uid,'status'=>1))->field('stu_id')->select());
        $to_choose = array();
        foreach ($all_stu_id as $one){
            //导师人数已满，则直接所有人不可选
            if($one['status'] == 1 || $one['status'] == 2){
                continue;
            }elseif($one['status'] == 0){
                if($stututor_mysql->where(array('stu_id'=>$one['stu_id'],'status'=>1))->find()){
                    continue;
                }else{
                    $result = $user_mysql->where(array('id'=>$one['stu_id']))->find();
                    array_push($to_choose,$result);
                }
            }
            continue;
        }
        return count($to_choose);
    }
    
    public function yes(){
        $stututor_mysql = M('stututor');
        $stu_num = count($stututor_mysql->where(array('tutor_id'=>  $this->uid,'status'=>1))->field('stu_id')->select());
        if($stu_num >= C('MAX_STU_NUM')){
            exit('Your Stu Number over MAX_STU_NUM');
        }
        $this->post['id'] || exit('No input id');
        if(!$stututor_mysql->where(array('stu_id'=>  $this->post['id'],'tutor_id'=>  $this->uid))->data(array('status'=>1))->save()){
            exit('Already Yes');
        }else{
            $this->redirect('choosestu');
        }
    }
    
    public function no(){
        $stututor_mysql = M('stututor');
        $this->post['id'] || exit('No input id');
        if(!$stututor_mysql->where(array('stu_id'=>  $this->post['id'],'tutor_id'=>  $this->uid))->data(array('status'=>2,'mark'=>  $this->post['mark']))->save()){
            exit('Already Yes');
        }else{
            $this->redirect('choosestu');
        }
    }
    
    public function mystu(){
        $stututor_mysql = M('stututor');
        $user_mysql = M('user');
        $all_stu_id = $stututor_mysql->where(array('tutor_id'=> $this->uid,'status'=>1))->field('stu_id')->select();
        $mystu = array();
        foreach ($all_stu_id as $one){
            $result = $user_mysql->find($one['stu_id']);
            if($result){
                array_push($mystu, $result);
            }
        }
        $this->assign('allstuinfo',$mystu);
        $this->display();
    }

    //导师学生毕业，导师可以选择“学生毕业”功能，如此操作，学生进入毕业学生名单，在学生-导师表中删除
    //导师可带学生名额会+1，学生进入毕业名单，此学生登录后，无法进行选导师操作和选实习操作
    public function graduate(){
        $stututor_mysql = M('stututor');
        $graduate_mysql = M('graduate');
        $this->post['id'] || exit('No input id');
        
        $stututor_mysql->where(array('stu_id'=>  $this->post['id'],'tutor_id'=>  $this->uid))->delete();
        $graduate_mysql->data(array('stu_id'=>  $this->post['id'],'tutor_id'=>  $this->uid,'time'=>date("Y-m-d H:m:s")))->add();
        $this->redirect('mystu');
    }
}

?>
