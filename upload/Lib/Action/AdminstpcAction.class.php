<?php
/**
* @author zf
*/

define("INC", ture);
class AdminstpcAction extends BaseAction{
	private function tologin(){
		$this->uid || exit('Error');
		
	}

	public function index(){

		$apply_mysql = M('apply');
                $apply = $apply_mysql->select();
                $user_mysql = M('user');
                foreach($apply as &$one){
                    $one['nickname'] = $user_mysql->field('name')->find($one['id']);
                }
                $this->assign('apply',$apply);
                $this->display();
	}
        
        public function passby(){
            $this->get['id'] || exit('Error!');
            
            $user_mysql = M('user');
            $apply_mysql = M('apply');
			
			$mes = $apply_mysql->find($this->get['id']);
            
			
            $type = $apply_mysql->field('type')->find($this->get['id']);
            if($type['type'] == 'tutor'){
                $user_mysql->where(array('id'=>$this->get['id']))->data(array('type'=>2))->save();
            }elseif($type['type'] == 'stu'){
                $user_mysql->where(array('id'=>$this->get['id']))->data(array('type'=>1,'in_date'=>$mes['in_date'],'stu_email'=>$mes['email'],'stu_name'=>$mes['name'],'stu_number'=>$mes['number'],'stu_phone'=>$mes['phone']))->save();
            }elseif($type['type'] == 'practice'){
                $user_mysql->where(array('id'=>$this->get['id']))->data(array('type'=>3))->save();
            }
            
            $apply_mysql->where(array('id'=>$this->get['id']))->delete();
            
			
		$letterid = M('letter')->add(array(
            'to' => $this->get['id'],
            'content' => '恭喜您，您的申请已经通过，您现在可以点击右上角的@图标便可进入后台管理界面',
            'addtime' => time(),
            'from' => $this->uid
        ));
        if (M('letterview')->add(array(
            'to' => $this->get['id'],
            'content' => '恭喜您，您的申请已经通过，您现在可以点击右上角的@图标便可进入后台管理界面',
            'addtime' => time(),
            'from' => $this->uid,
            'letterid' => $letterid
        ))) {
            $user_mysql->where(array(
                'id' => $this->get['id']
            ))->setInc('newmsg');
            M('newmsg')->add(array(
                'name' => 'admin',
                'letterid' => $letterid,
                'uid' => $this->get['id']
            ));
		}
            $this->redirect('index');
            
        }
        
        public function refuse(){
            $this->get['id'] || exit('Error!');
            
            $apply_mysql = M('apply');
            $apply_mysql->where(array('id'=>$this->get['id']))->delete();
			
			
		$letterid = M('letter')->add(array(
            'to' => $this->get['id'],
            'content' => 'sorry,您的申请没有通过！',
            'addtime' => time(),
            'from' => $this->uid
        ));
        if (M('letterview')->add(array(
            'to' => $this->get['id'],
            'content' => 'sorry,您的申请没有通过！',
            'addtime' => time(),
            'from' => $this->uid,
            'letterid' => $letterid
        ))) {
            M('user')->where(array(
                'id' => $this->get['id']
            ))->setInc('newmsg');
            M('newmsg')->add(array(
                'name' => 'admin',
                'letterid' => $letterid,
                'uid' => $this->get['id']
            ));
		}
			
            $this->redirect('index');
        }

        //分配导师
	//显示发布的导师信息
	//显示待分配的学生与可分配的导师(导师的右侧有导师已有学生的人数)
	public function allocatetutor(){
		
		if(!$grade = $this->get['grade']){
			$grade = date('Y');
		}
		
		$user_mysql = M('user');
		$stututor_mysql = M('stututor');
		//列出所有未选择导师的学生
		$allstu = $user_mysql->where(array('type'=>1,'in_date'=>$grade))->select();
		$stu = array();
		foreach ($allstu as $one) {
			if(!$stututor_mysql->where(array('stu_id'=>$one['id'],'status'=>1))->find()){
				if($one['stu_number']&&$one['stu_name']){
                                    if($stututor_mysql->where(array('stu_id'=>$one['id']))->find()){
                                        array_push($stu, $one);
                                    }
				}
			}
		}

		//列出所有导师
		$tutor_mysql = M('tutor');
		$alltutor = $user_mysql->where(array('type'=>2))->field('id')->select();
		$tutor = array();
		foreach ($alltutor as $one) {
			$temp = $tutor_mysql->find($one['id']);
			if($temp){
				$temp['stunumber'] = $stututor_mysql->where(array('tutor_id'=>$one['id'],'status'=>1,'in_date'=>$grade))->count();
				array_push($tutor, $temp);
			}
		}
	

		$this->assign('stu',$stu);
		$this->assign('tutor',$tutor);
		$this->assign('grade',$grade);
                

		$this->display();
	}

	//管理员分配，删除所有学生所选择的志愿，并提示是管理员分配
        public function allocatetutorhandler(){
        	$grade = $this->post['grade'];
			
			if(is_null($grade)) die('Error');
			
            $_POST['stu'] && $_POST['tutor'] || exit("Error!");
            //导师所带学生人数
            $stututor_mysql = M('stututor');
            $stunumber = $stututor_mysql->where(array('tutor_id'=>$_POST['tid'],'status'=>1,'in_date'=>$grade))->count();
            if((count($_POST['stu'])+$stunumber) >= C('MAX_STU_NUM')){
                exit('Tutor MAX_STU_NUM over!');
            }
            foreach($_POST['stu'] as $one){
                $this->allocatetutorhandler2($one, $_POST['tutor'],$grade);
            }
            $this->redirect('allocatetutor');
            
        }
        private function allocatetutorhandler2($sid,$tid,$grade){
		$sid && $tid || exit('Error!');
		$stututor_mysql = M('stututor');
		$stututor_mysql->where(array('stu_id'=>$sid))->delete();
		$stututor_mysql->data(array('stu_id'=>$sid,'tutor_id'=>$tid,'status'=>1,'isadmin'=>1,'in_date'=>$grade))->add();
	}

	//查看某位老师的所有学生
	public function viewtstu(){
		$this->display();
	}

	//分配实习
	//显示发布的实习岗位
	//岗位右侧显示已有的学生和岗位已招收的人数
	public function allocatepractice(){
            
		//列出所有未实习的学生
		$user_mysql = M('user');
		$stupractice_mysql = M('stupractice');
		$allstu = $user_mysql->where(array('type'=>1))->select();
		$stu = array();
		foreach ($allstu as $one) {
			if(!$stupractice_mysql->where(array('stu_id'=>$one['id'],'status'=>1))->find()){
				if($one['stu_number']&&$one['stu_name']){
                                    if($stupractice_mysql->where(array('stu_id'=>$one['id']))->find()){
                                        array_push($stu, $one);
                                    }
				}
			}
		}

		//列出所有发布了的实习岗位
		$practice_mysql = M('practice');
		$allpractice = $practice_mysql->where(array('status'=>1))->select();
		$practice = array();
		foreach ($allpractice as $one) {
			if($this->uid == $one['uid']){
				$one['corporate'] = 'Admin';
				$one['corporate_about'] = 'Admin';
			}else{
				$one['corporate'] = $user_mysql->field('corporate')->find($one['uid']);
				$one['corporate_about'] = $user_mysql->field('corporate_about')->find($one['uid']);
			}

			$one['stunumber'] = $stupractice_mysql->where(array('practice_id'=>$one['id'],'status'=>1))->count();
			array_push($practice, $one);
		}

		$this->assign('stu',$stu);
		$this->assign('practice',$practice);
                


		$this->display();
	}

	public function allocatepracticehandler(){
            
		$_POST['stu'] && $_POST['practice'] || exit('Error!');
		foreach($_POST['stu'] as $one){
                    $this->allocatepracticehandler2($one, $_POST['practice']);
                }

		$this->redirect('allocatepractice');
	}
        
        private function allocatepracticehandler2($sid,$pid){
		$sid && $pid || exit('Error!');
		$stupractice_mysql = M('stupractice');
		$stupractice_mysql->where(array('stu_id'=>$sid))->delete();
		$stupractice_mysql->data(array('stu_id'=>$sid,'practice_id'=>$pid,'status'=>1,'isadmin'=>1))->add();
	}

	//查看某一个岗位的学生
	public function viewpstu(){
	}

	//发布实习
	public function publishpractice(){
		$this->display();
	}
	public function publishpracticehandler(){
	}

	//编辑某位学生的个人信息
	public function viewstu(){
			if(!($grade = $this->get['grade'])){
				$grade = date('Y');
			}
			
            $user_mysql = M('user');
            $tutor_mysql = M('tutor');
            $stututor_mysql = M('stututor');
            $practice_mysql = M('practice');
            $stupractice_mysql = M('stupractice');
            $allstu = $user_mysql->where(array('type'=>1,'in_date'=>$grade))->field('id,stu_number,stu_name,stu_sex,stu_QQ,stu_workplace,stu_email,stu_phone,in_date,stu_studyexperience,stu_workexperience,stu_honor,stu_selfvalue')->select();
            $stu = array();
            foreach($allstu as $one){
                if($one['stu_name'] && $one['stu_number']){
                    $tutor_temp = $stututor_mysql->where(array('stu_id'=>$one['id'],'status'=>1))->field('tutor_id')->find();
                    if($tutor_temp){
                        $one['tutor'] = $tutor_mysql->where(array('id'=>$tutor_temp['tutor_id']))->field('name')->find();
                    }elseif($stututor_mysql->where(array('stu_id'=>$one['id']))->field('tutor_id')->find()){
                        $one['tutor'] = -1;
                    }else{
                        $one['tutor'] = 0;
                    }
                    
                    $practice_temp = $stupractice_mysql->where(array('stu_id'=>$one['id'],'status'=>1))->field('practice_id')->find();
                    if($practice_temp){
                        $temp_pid = $practice_mysql->where(array('id'=>$practice_temp['practice_id']))->field('uid')->find();
                        $one['practice'] = $user_mysql->field('corporate')->find($temp_pid);
                    }elseif($stupractice_mysql->where(array('stu_id'=>$one['id']))->field('practice_id')->find()){
                        $one['practice'] = -1;
                    }else{
                        $one['practice'] = 0;
                    }
                    
                    array_push($stu, $one);
                }
            }

            $this->assign('stu',$stu);
			$this->assign('grade',$grade);
            $this->display();
	}
        
        public function editstu(){
            $_GET['id'] || exit('Error!');
            $user_mysql = M('user');
            $stu = $user_mysql->find($_GET['id']);
            if($stu['type'] != 1) exit ('Not a student!');
            $this->assign('stuinfo',$stu);
            $this->display();
        }
        

        public function editstuhandler(){
            $user_mysql = M('user');
            if($user_mysql->save($this->post)){
                $this->redirect('viewstu');
            }else{
                exit("No data updata!");
            }
	}


	//查看导师信息
	public function viewtutor(){
		$user_mysql = M('user');
		$tutorid = $user_mysql->where(array('type'=>2))->field('id')->select();
		$tutor_mysql = M('tutor');
                $stututor_mysql = M('stututor');

		$tutor = array();
		foreach ($tutorid as $value) {
			$temp = $tutor_mysql->find($value['id']);
                        $temp['stunumber'] = $stututor_mysql->where(array('tutor_id'=>$value['id'],'status'=>1))->count();
			if($temp['id']){
				array_push($tutor, $temp);
			}
		}
                

		$this->assign('tutor',$tutor);
		$this->display();

	}
	//编辑导师的个人信息
	public function edittutor(){
		$this->get['id'] || exit('Error!');
		$tutor_mysql = M('tutor');
		$tutor = $tutor_mysql->find($this->get['id']);

		$this->assign('tutorinfo',$tutor);
		$this->assign('id',$this->get['id']);
		$this->display();
	}
	public function edittutorhandler(){
                $this->post['id'] || exit('Error!');
                
		$tutor_mysql = M('tutor');

		if($tutor_mysql->save($this->post)){
                    $this->redirect('viewtutor');
                }else{
                    exit('No Data Update!');
                }

		
	}

	public function position(){
		$user_mysql = M('user');
		$corporate = $user_mysql->where(array('type'=>3))->field('id,corporate,corporate_about')->select();
		$practice_mysql = M('practice');
                $stupractice_mysql = M('stupractice');
		foreach ($corporate as &$one) {
			$position = $practice_mysql->where(array('uid'=>$one['id']))->select();
                        foreach($position as &$oneposition){
                            $oneposition['stunumber'] = $stupractice_mysql->where(array('practice_id'=>$oneposition['id'],'status'=>1))->count();
                        }
                        $one['stations'] = $position;
		}
                
                $admin = array();//管理员新建的职位
                $adminposition = $practice_mysql->where(array('uid'=>$this->uid))->select();
                foreach($adminposition as &$oneposition){
                    $oneposition['stunumber'] = $stupractice_mysql->where(array('practice_id'=>$oneposition['id'],'status'=>1))->count();
                }
                if(!is_null($adminposition)){
                    $admin['id'] = $this->uid;
                    $admin['corporate'] = "Admin";
                    $admin['stations'] = $adminposition;
                    array_push($corporate, $admin);
                }
                
                
                $this->assign('adminuid',  $this->uid);
		$this->assign('corporate',$corporate);
                

		$this->display();
	}
        
        public function newposition(){
            $this->display();
        }
        
        public function newpositionhandler(){
                        
            $practice_mysql = M('practice');
            $this->post || exit('No Post Data');
            $temp = $this->post;
            $temp['uid'] = $this->uid;
            $temp['time'] = date('Y-m-d H:m:s');
            print_r($temp);die;
            if($practice_mysql->data($temp)->add()){
                $this->redirect('position');
            }else{
                exit('something wrong!');
            }
        }

        //编辑实习单位实习信息
	public function editpractice(){
		$_GET['id'] || exit('Error!');
		$_GET['pid'] || exit('Error!');
		//获得企业信息
		$user_mysql = M('user');
		$corporate = $user_mysql->where(array('id'=>$_GET['id']))->field('corporate,corporate_about')->find();

		//获取实习信息
		$practice_mysql = M('practice');
		$practice = $practice_mysql->where(array('id'=>$_GET['pid'],'uid'=>$_GET['id']))->find();

		$this->assign('corporate',$corporate);
		$this->assign('practice',$practice);
		$this->assign('id',$_GET['id']);
		$this->assign('pid',$_GET['pid']);



		$this->display();
	}
	public function editpracticehandler(){
		$user_mysql = M('user');
		$result1 = $user_mysql->where(array('id'=>$this->post['id']))->data(array('corporate'=>$this->post['corporate'],'corporate_about'=>$this->post['corporate_about']))->save();

		$practice_mysql = M('practice');
		$result2 = $practice_mysql->where(array('id'=>$this->post['pid'],'uid'=>$this->post['id']))->data($this->post)->save();

		$this->redirect('position');

	}
        
        public function delposition(){
            $_GET['id'] || exit('Error!');
            $practice_mysql = M('practice');
            $stupractice_mysql = M('stupractice');
            $practice_mysql->where(array('id'=>$_GET['id']))->delete();
            $stupractice_mysql->where(array('practice_id'=>$_GET['id']))->delete();
            $this->redirect('position');
        }
        
        public function publishposition(){
            $_GET['id'] || exit('Error!');
            $practice_mysql = M('practice');
            $practice_mysql->where(array('id'=>$_GET['id'],'uid'=>  $this->uid))->data(array('status'=>1))->save();
            $this->redirect('position');
        }
        
        public function calcelpublishposition(){
            $_GET['id'] || exit('Error!');
            $practice_mysql = M('practice');
            $practice_mysql->where(array('id'=>$_GET['id'],'uid'=>  $this->uid))->data(array('status'=>0))->save();
            $this->redirect('position');
        }
        
        public function systemopen(){
            $this->display();
        }
        
        public function systemopenhandler(){
            $starttime =  substr($this->post['open'],0,10);
            $endtime = substr($this->post['open'],-10,10);
            $module = $this->post['module'];
            $starttime&&$endtime&&!is_null($module)||exit('Error');
            
            $module_mysql = M('module');
            $module_mysql->where(array('module'=>$module))->delete();
            $module_mysql->add(array('module'=>$module,'starttime'=>$starttime,'endtime'=>$endtime));
            $this->redirect('index', NULL, 2, 'success!');
        }
		
		
		//导出某个年级的学生和导师表格
		public function export_stu_tutor(){
			$grade = $this->post['grade'];
			if(!$grade) $grade = $this->get['grade'];
			if(is_null($grade)) die("未选择年级，错误！");
			$all = M('stututor')->where(array('in_date'=>$grade,'status'=>1))->select();
			
			$user_mysql = M('user');
			$tutor_mysql = M('tutor');
			$export = array();
			$temp = array(
				'teacher'=>'teacher',
				'stu_number'=>'stu_num',
				'stu_name'=>'stu_name',
				'stu_sex'=>'stu_sex',
				'stu_email'=>'stu_email',
				'stu_phone'=>'stu_phone',
				);
			array_push($export,$temp);
			foreach($all as $one){
				$tutor = $tutor_mysql->field('name')->find($one['tutor_id']);
				$stu = $user_mysql->find($one['stu_id']);
				$temp['teacher'] = $tutor['name'];
				$temp['stu_number'] = $stu['stu_number'];
				$temp['stu_name'] = $stu['stu_name'];
				$temp['stu_sex'] = $stu['stu_sex'];
				$temp['stu_email'] = $stu['stu_email'];
				$temp['stu_phone'] = $stu['stu_phone'];
				
				array_push($export,$temp);
			}
			$excel_action = new ExcelAction();
			
			$excel_action->to_export_excel($export);
			
		}

		public function import_teacher(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			//$upload->allowExts  = array('xls','xlsx');
			//$upload->allowTypes = array('xls','xlsx');
			$upload->savePath =  THINK_PATH.'/../Public/upload/excel/';
			if(!$upload->upload()) {
				$this->error($upload->getErrorMsg());
			}else{
				$info =  $upload->getUploadFileInfo();
			}
			$excel = new ExcelAction();
			$path = $info[0]['savepath'].$info[0]['savename'];
			$data = $excel->to_inport_excel($path);
			unlink($path);
			
			if(!$this->post['grade']) die('未选择年级');
			
			$user_mysql = M('user');
			
			foreach($data as $one){
				if($user_mysql->where(array('name'=>$one['A']))->find()){
					continue;
				}
				if($one['A'] && $one['B']){
					$data['name'] = $one['A'];
					$data['pwd'] = '6c77d8bdba19c57c62beb38cb37d62ba';
					$data['stu_number'] = $one['A'];
					$data['stu_name'] = $one['B'];
					$data['type'] = 1;
					$data['in_date'] = $this->post['grade'];
					$user_mysql->data($data)->add();
				}
			}
			
			$this->redirect('viewstu',array('grade'=>$this->post['grade']));
			
		}

		public function import_stu(){
			import('ORG.Net.UploadFile');
			$upload = new UploadFile();
			//$upload->allowExts  = array('xls','xlsx');
			//$upload->allowTypes = array('xls','xlsx');
			$upload->savePath =  THINK_PATH.'/../Public/upload/excel/';
			if(!$upload->upload()) {
				$this->error($upload->getErrorMsg());
			}else{
				$info =  $upload->getUploadFileInfo();
			}
			$excel = new ExcelAction();
			$path = $info[0]['savepath'].$info[0]['savename'];
			$data = $excel->to_inport_excel($path);
			unlink($path);
			

			
			$user_mysql = M('user');
			$tutor_mysql = M('tutor');
			
			foreach($data as $one){
				if($user_mysql->where(array('name'=>$one['A']))->find()){
					continue;
				}
				if($one['A'] && $one['B']){
					$data['name'] = $one['A'];
					$data['pwd'] = '6c77d8bdba19c57c62beb38cb37d62ba';
					$data['stu_name'] = $one['B'];
					$data['type'] = 2;
					$id = $user_mysql->data($data)->add();
					
					if(!$id) continue;
					
					$tutor_mysql->data(array('id'=>$id,'name'=>$one['A']))->add();
				}
			}
			
			$this->redirect('viewtutor');
			
		}
		
}

?>