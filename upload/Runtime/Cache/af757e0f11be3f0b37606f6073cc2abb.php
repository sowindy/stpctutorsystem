<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
                <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
                <meta name="keywords" content="<?php echo $keywords==NULL?$setting['site_keywords']:$keywords; ?>" />
                <meta name="description" content="<?php echo $description==NULL?$setting['site_description']:$description; ?>"  />
                <meta name="author" content="" />
                <meta name="copyright" content="" />
                <link rel="shortcut icon" href="__PUBLIC__/css/favicon.ico" />
                <title><?php echo ($user['newmsg']!=0||$user['newnotice']!=0)?'('.($user['newmsg']+$user['newnotice']).')'.$title:$title; ?></title>
		<!--basic styles-->
		<link href="__BOOTCSS__/bootstrap.min.css" rel="stylesheet" />
		<link href="__BOOTCSS__/bootstrap-responsive.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="__BOOTCSS__/font-awesome.min.css" />
		<!--[if IE 7]>
		  <link rel="stylesheet" href="__BOOTCSS__/font-awesome-ie7.min.css" />
		<![endif]-->
		<!--page specific plugin styles-->
		<link rel="stylesheet" href="__BOOTCSS__/prettify.css" />
		<!--ace styles-->
		<link rel="stylesheet" href="__BOOTCSS__/ace.min.css" />
		<link rel="stylesheet" href="__BOOTCSS__/ace-responsive.min.css" />
		<link rel="stylesheet" href="__BOOTCSS__/ace-skins.min.css" />
		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="__BOOTCSS__/ace-ie.min.css" />
		<![endif]-->
		<!--inline styles related to this page-->

	<body>
                <div class="navbar">
			<div class="navbar-inner">
				<div class="container-fluid">
					<a href="#" class="brand">
						<small>
							<i class="icon-leaf"></i>
							人文与社会科学学院
						</small>
					</a><!--/.brand-->
                                        <ul class="nav ace-nav pull-right">
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
                                                                <img class="nav-user-photo" src=<?php $uid = sprintf("%09d", $uid);$dir1 = substr($uid, 0, 3);$dir2 = substr($uid, 3, 2);$dir3 = substr($uid, 5, 2);$name = $_SESSION['uid'].'_min.jpg';echo './Public/avatar/avatar_dir/'.$dir1.'/'.$dir2.'/'.$dir3.'/'.$name; ?> alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									Teacher
								</span>

								<i class="icon-caret-down"></i>
							</a>

							<ul class="user-menu pull-right dropdown-menu dropdown-yellow dropdown-caret dropdown-closer">
								<li>
									<a href="<?php echo U('User/index');?>">
										<i class="icon-cog"></i>
										个人信息
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="<?php echo U('Account/logoutnew');?>">
										<i class="icon-off"></i>
										登出
									</a>
								</li>
							</ul>
						</li>
					</ul><!--/.ace-nav-->
				</div><!--/.container-fluid-->
			</div><!--/.navbar-inner-->
		</div>
		<div class="main-container container-fluid">
			<a class="menu-toggler" id="menu-toggler" href="#">
				<span class="menu-text"></span>
			</a>

			<div class="sidebar" id="sidebar">
				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
						<button class="btn btn-small btn-success">
							<i class="icon-signal"></i>
						</button>

						<button class="btn btn-small btn-info">
							<i class="icon-pencil"></i>
						</button>

						<button class="btn btn-small btn-warning">
							<i class="icon-group"></i>
						</button>

						<button class="btn btn-small btn-danger">
							<i class="icon-cogs"></i>
						</button>
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
						<span class="btn btn-success"></span>

						<span class="btn btn-info"></span>

						<span class="btn btn-warning"></span>

						<span class="btn btn-danger"></span>
					</div>
				</div><!--#sidebar-shortcuts-->

				<ul class="nav nav-list">
					<li class="active">
						<a href="<?php echo U('index');?>">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> 首页 </span>
						</a>
					</li>

					<li>
						<a href="<?php echo U('info');?>">
							<i class="icon-text-width"></i>
							<span class="menu-text"> 信息修改 </span>
						</a>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> 学生审核 <?php if($num): ?><span class="badge badge-important"><?php echo ($num); ?></span><?php endif; ?></span>
                                                        
							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo U('choosestu');?>">
									<i class="icon-double-angle-right"></i>
									待审核<?php if($num): ?><span class="badge badge-important"><?php echo ($num); ?></span><?php endif; ?>
								</a>
							</li>

							<li>
								<a href="<?php echo U('mystu');?>">
									<i class="icon-double-angle-right"></i>
									我的学生
								</a>
							</li>

							<li>
								<a href="<?php echo U('stulist');?>">
									<i class="icon-double-angle-right"></i>
									查看所有
								</a>
							</li>
						</ul>
					</li>
                                        <li>
						<a href="<?php echo U('Index/index');?>">
							<i class="icon-list-alt"></i>
							<span class="menu-text"> 返回论坛 </span>
						</a>
					</li>
				</ul><!--/.nav-list-->

				<div class="sidebar-collapse" id="sidebar-collapse">
					<i class="icon-double-angle-left"></i>
				</div>
			</div>

			<div class="main-content">
				<div class="breadcrumbs" id="breadcrumbs">
				</div>

				<div class="page-content">					
                                    <div class="span6">
                                        <div class="span7 infobox-container">
                                            <div class="infobox infobox-green infobox-small infobox-dark" style="width: 200px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">姓名</span>
                                                            <div class="infobox-content"><?php echo ($tutorinfo["name"]); ?></div>
                                                    </div>
                                            </div>

                                            <div class="infobox infobox-blue infobox-small infobox-dark" style="width: 200px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">性别</span>
                                                            <div class="infobox-content"><?php if($tutorinfo['sex']): ?>男<?php else: ?>女<?php endif; ?></div>
                                                    </div>
                                            </div>

                                            <div class="infobox infobox-brown infobox-small infobox-dark" style="width: 200px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">职称</span>
                                                            <div class="infobox-content">
                                                                <?php if($tutorinfo['position'] == 1): ?>
                                                                教授
                                                                <?php elseif($tutorinfo['position'] == 2): ?>
                                                                副教授
                                                                <?php elseif($tutorinfo['position'] == 3): ?>
                                                                讲师
                                                                <?php endif; ?>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="infobox infobox-green"  style="width: 300px">
                                                    <div class="infobox-data">
                                                        <span class="infobox-data-number">手机/固话</span>
                                                            <div class="infobox-content"><?php echo ($tutorinfo["phone"]); ?><?php if($tutorinfo['phone']&&$tutorinfo['tel']): ?>/<?php endif; ?><?php echo ($tutorinfo["tel"]); ?></div>
                                                    </div>
                                            </div>
                                            <div class="infobox infobox-green"  style="width: 300px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">邮箱</span>
                                                            <div class="infobox-content"><?php echo ($tutorinfo["email"]); ?></div>
                                                    </div>
                                            </div>
                                            <?php if($tutorinfo['direction']): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">研究方向</span>
                                                            <div class="infobox-content" style="width: 580px">
                                                                <?php echo htmlspecialchars_decode($tutorinfo['direction']); ?>
                                                            </div>
                                                    </div>
                                            </div>
                                            <?php endif;?>
                                            <?php if($tutorinfo['course']): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">担任课程</span>
                                                            <div class="infobox-content"><?php echo htmlspecialchars_decode($tutorinfo['course']); ?></div>
                                                    </div>
                                            </div>
                                            <?php endif;?>
                                            <?php if($tutorinfo['paper']): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">论文</span>
                                                            <div class="infobox-content"><?php echo htmlspecialchars_decode($tutorinfo['paper']); ?></div>
                                                    </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($tutorinfo['project']): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">项目</span>
                                                            <div class="infobox-content"><?php echo htmlspecialchars_decode($tutorinfo['project']); ?></div>
                                                    </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($tutorinfo['demand']): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                    <div class="infobox-data">
                                                            <span class="infobox-data-number">学生要求</span>
                                                            <div class="infobox-content"><?php echo htmlspecialchars_decode($tutorinfo['demand']); ?></div>
                                                    </div>
                                            </div>
                                            <?php endif; ?>
                                            <?php if($tutorinfo['status'] == 0): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                <a href="<?php echo U('Tutor/publishinfo');?>" class="btn btn-large btn-info btn-block">发布信息</a>
                                                <a href="<?php echo U('Tutor/info');?>" class="btn btn-large btn-success btn-block">编辑信息</a>
                                            </div>
                                            <?php elseif($tutorinfo['status'] == 1): ?>
                                            <div class="infobox infobox-blue"  style="width: 614px">
                                                <a href="<?php echo U('Tutor/cancelinfo');?>" class="btn btn-large btn-warning btn-block">取消发布</a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="span6">
                                        
                                    </div>
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>

		<!--basic scripts-->

		<!--[if !IE]>-->

		<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!--<![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]>-->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='__BOOTJS__/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!--<![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='__BOOTJS__/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='__BOOTJS__/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="__BOOTJS__/bootstrap.min.js"></script>

		<!--page specific plugin scripts-->

		<script src="__BOOTJS__/prettify.js"></script>
                <script src="__BOOTJS__/fuelux/fuelux.wizard.min.js"></script>
                
		<!--ace scripts-->

		<script src="__BOOTJS__/ace-elements.min.js"></script>
		<script src="__BOOTJS__/ace.min.js"></script>


		<!--inline scripts related to this page-->

		<script type="text/javascript">
			$(function() {
			
				window.prettyPrint && prettyPrint();
				$('#id-check-horizontal').removeAttr('checked').on('click', function(){
					$('#dt-list-1').toggleClass('dl-horizontal').prev().html(this.checked ? '&lt;dl class="dl-horizontal"&gt;' : '&lt;dl&gt;');
				});
			
			})
                        $('#modal-wizard .modal-header').ace_wizard();
                        $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		</script>
	</body>

	</body>
</html>