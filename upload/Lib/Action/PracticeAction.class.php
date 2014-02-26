<?php

define("INC",true);
class PracticeAction extends BaseAction{
    
    //检验身份
    private function tologin(){
        $this->uid == NULL && exit('Access Denied!');
        $user_mysql = M('user');
        $type = $user_mysql->where(array('id'=>  $this->uid))->getField('type');
        if($type != 3){
            exit('You are not a practice');
        }
    }
    
    
    //新职位界面
    public function newposition(){
        $this->display();
    }
    //编辑职位界面
    public function editposition(){
        $this->tologin();
        $_GET || exit('No Get Data');
        $id = $_GET['id'];
        $practice_mysql = M('practice');
        $positioninfo = $practice_mysql->find($id);
        $this->assign('positioninfo',$positioninfo);
        $this->display();
    }


    public function newpositionhandler(){
        $this->tologin();
        $practice_mysql = M('practice');
        $this->post || exit('No Post Data');
        $temp = $this->post;
        $temp['uid'] = $this->uid;
        if($practice_mysql->data($temp)->add()){
            $this->redirect('index');
        }else{
            exit('something wrong!');
        }
    }
    
    public function editpositionhandler(){
        $this->tologin();
        $practice_mysql = M('practice');
        $this->post || exit('No Post Data');
        if($practice_mysql->save($this->post)){
            $this->redirect('index');
        }else{
            exit('no new data');
        }
    }
    
    public function publishposition(){
        $_GET || exit('No Get Data');
        $id = $_GET['id'];
        $practice_mysql = M('practice');
        $uid = $practice_mysql->field('uid')->find($id);
        if($uid['uid'] != $this->uid){
            exit('Error!');
        }
        if($practice_mysql->where(array('id'=>$id))->data(array('status'=>1))->save()){
            $this->redirect('position');
        }else{
            exit('Have already Published');
        }
    }
    
    public function cancelposition(){
        $_GET || exit('No Get Data');
        $id = $_GET['id'];
        $practice_mysql = M('practice');
        $uid = $practice_mysql->field('uid')->find($id);
        if($uid['uid'] != $this->uid){
            exit('Error!');
        }
        if($practice_mysql->where(array('id'=>$id))->data(array('status'=>0))->save()){
            $this->redirect('position');
        }else{
            exit('Have already Canceled');
        }
    }
    
    public function info(){
        $this->tologin();
        $user_mysql = M('user');
        $userinfo = $user_mysql->field('corporate,corporate_about')->find($this->uid);
        $this->assign('userinfo',$userinfo);
        $this->display();
    }
    
    public function infohandler(){
        $this->tologin();
        $user_mysql = M('user');
        $this->post['corporate'] || exit('No corporate name!');
        if($user_mysql->where(array('id'=>  $this->uid))->data($this->post)->save()){
            $this->redirect('index');
        }else{
            exit('No new data!');
        }
    }
    
    public function choosestu(){
        $_GET || exit('No Get Data!');
        $id = $_GET['id'];
        $practice_mysql = M('practice');
        $uid = $practice_mysql->field('uid,num')->find($id);
        if($uid['uid'] != $this->uid){
            exit('Reject');       
        }
        $stupractice_mysql = M('stupractice');
        $user_mysql = M('user');
        $all_stu_id = $stupractice_mysql->where(array('practice_id'=>$id,'status'=>0))->select();
        $all_stu = array();
        //人数已满，则直接跳转
        $num = count($stupractice_mysql->where(array('practice_id'=>$id,'status'=>1))->select());
        if($num >= $uid['num']){
            $this->redirect('index',NULL,3,'Already choose '.$uid['num'].' students');
        }
        foreach ($all_stu_id as $one){
            if($stupractice_mysql->where(array('stu_id'=>$one['stu_id'],'status'=>1))->find()){
                continue;
            }
            $result = $user_mysql->find($one['stu_id']);
            $result['practice_id'] = $id;
            if($result){
                array_push($all_stu, $result);
            }
        }
        $this->assign('allstu',$all_stu);
        $this->display();
    }
    
    private function choosenum(int $id){
        $practice_mysql = M('practice');
        $uid = $practice_mysql->field('uid,num')->find($id);
        $stupractice_mysql = M('stupractice');
        $user_mysql = M('user');
        $all_stu_id = $stupractice_mysql->where(array('practice_id'=>$id,'status'=>0))->select();
        $all_stu = array();
        //人数已满，则直接跳转
        $num = count($stupractice_mysql->where(array('practice_id'=>$id,'status'=>1))->select());
        if($num >= $uid['num']){
            $this->redirect('index',NULL,3,'Already choose '.$uid['num'].' students');
        }
        foreach ($all_stu_id as $one){
            if($stupractice_mysql->where(array('stu_id'=>$one['stu_id'],'status'=>1))->find()){
                continue;
            }
            $result = $user_mysql->find($one['stu_id']);
            $result['practice_id'] = $id;
            if($result){
                array_push($all_stu, $result);
            }
        }
        return count($all_stu);
    }
    
    public function yes(){
        $this->tologin();
        $this->post['stu_id'] &&  $this->post['practice_id'] || exit('no post data');
        $stupractice_mysql = M('stupractice');
        
        if($stupractice_mysql->where(array('stu_id'=>  $this->post['stu_id'],'practice_id'=>  $this->post['practice_id']))->data(array('status'=>1))->save()){
            $this->redirect('choosestu',array('id'=>  $this->post['practice_id']));
        }else{
            exit('have alresdy!');
        }
    }
    
    public function no(){
        $this->tologin();
        $this->post['stu_id'] &&  $this->post['practice_id'] || exit('no post data');
        $stupractice_mysql = M('stupractice');
        
        if($stupractice_mysql->where(array('stu_id'=>  $this->post['stu_id'],'practice_id'=>  $this->post['practice_id']))->data(array('status'=>2,'mark'=>  $this->post['mark']))->save()){
            $this->redirect('choosestu',array('id'=>  $this->post['practice_id']));
        }else{
            exit('have alresdy!');
        }
    }
    
    public function index(){
        $this->tologin();
        $practice_mysql = M('practice');
        $stupractice_mysql = M('stupractice');
        $user_mysql = M('user');
        $allpracticeid = $practice_mysql->where(array('uid'=>  $this->uid))->field('id as practice_id,num,station')->select();
        foreach ($allpracticeid as &$one){
            $one['signup'] = $this->choosenum($one['practice_id']);
            $all_stu_id = $stupractice_mysql->where(array('practice_id'=>$one['practice_id'],'status'=>1))->field('stu_id')->select();
            $temp = array();
            foreach ($all_stu_id as $onestu){
                array_push($temp, $user_mysql->find($onestu['stu_id']));
            }
            $one['stuinfo'] = $temp;
        }
        $this->assign('stuinfo',$allpracticeid);
        $this->display();
    }
    
    public function endpractice(){
        $this->tologin();
        $this->post['stu_id'] && $this->post['practice_id'] || exit('No Post Data');
        $practice_mysql = M('practice');
        $uid = $practice_mysql->field('uid')->find($this->post['practice_id']);
        if($uid['uid'] != $this->uid){
            exit('Error!');
        }
        
        $stupractice_mysql = M('stupractice');
        if($stupractice_mysql->where(array('stu_id'=>$this->post['stu_id']))->delete()){
            $this->redirect('index');
        }else{
            exit('something wrong');
        }
    }
    
    public function position(){
        $this->tologin();
        $practice_mysql = M('practice');
        $allposition = $practice_mysql->where(array('uid'=>  $this->uid))->select();
        $this->assign('allposition',$allposition);
        $this->display();
    }
            
}

?>