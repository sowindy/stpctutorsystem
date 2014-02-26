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
                <link rel="stylesheet" href="__BOOTCSS__/daterangepicker.css" />
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
									Super Admin
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
						<a href="<?php echo U('allocatetutor');?>">
							<i class="icon-ticket"></i>
							<span class="menu-text"> 分配导师 </span>
						</a>
					</li>
                                        <li>
						<a href="<?php echo U('allocatepractice');?>">
							<i class="icon-won"></i>
							<span class="menu-text"> 分配实习 </span>
						</a>
					</li>
                                        
                                        <li>
						<a href="<?php echo U('viewstu');?>">
							<i class="icon-user-md"></i>
							<span class="menu-text"> 学生 </span>
						</a>
					</li>
                                        
                                        <li>
						<a href="<?php echo U('viewtutor');?>">
							<i class="icon-leaf"></i>
							<span class="menu-text"> 导师 </span>
						</a>
					</li>
                                        
                                        
                                        <li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> 实习 </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo U('position');?>">
									<i class="icon-double-angle-right"></i>
									所有岗位
								</a>
							</li>

							<li>
								<a href="<?php echo U('newposition');?>">
									<i class="icon-double-angle-right"></i>
									新增岗位
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
                                    <form action="<?php echo U('systemopenhandler');?>" method="post">
                                        <input type="hidden" name="ha" value="<?php echo ($ha); ?>" />
                                        <div class="control-group span6 offset3">
                                                <label class="control-label" for="form-field-1">开放时间的范围：</label>

                                                <div class="controls">
                                                    <div class="">
                                                        <input type="text" name="open" class="input-xxlarge" id="id-date-range-picker-1" name="data"  />
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="control-group span6 offset3">
                                                <label class="control-label" for="form-field-2">模块：</label>
                                                <div class="controls">
                                                    <div class="span6">
                                                        <input name="module" type="radio" checked value="1" />
                                                        <span class="lbl span1">学生模块</span>
                                                        <input name="module" type="radio" value="0" />
                                                        <span class="lbl span1 offset1">导师模块</span>
                                                    </div>
                                                </div>
                                        </div>

                                        <div class="control-group span6 offset7">
                                            <button class="btn btn-success">提交信息</button>
                                        </div>
                                    </form>
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
                <script src="__BOOTJS__/moment.min.js"></script>
                <script src="__BOOTJS__/daterangepicker.js"></script>
                
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
                        $('#id-date-range-picker-1').daterangepicker({
                            format: 'YYYY-MM-DD'
                        }).prev().on(ace.click_event, function(){
					$(this).next().focus();
				});
		</script>
	</body>

	</body>
</html>