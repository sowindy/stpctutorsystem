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
					<li  class="active">
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
							<span class="menu-text"> 导师 </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo U('tutor');?>">
									<i class="icon-double-angle-right"></i>
									选导师
								</a>
							</li>

							<li>
								<a href="<?php echo U('choosetutorresult');?>">
									<i class="icon-double-angle-right"></i>
									选导师结果
								</a>
							</li>
						</ul>
					</li>
                                        
                                        <li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> 实习 </span>
							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo U('practice');?>">
									<i class="icon-double-angle-right"></i>
									选实习
								</a>
							</li>

							<li>
								<a href="<?php echo U('choosepracticeresult');?>">
									<i class="icon-double-angle-right"></i>
									选实习结果
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
                                        <table class="table  table-hover table-bordered table-striped table-condensed">
                                            <tbody>
                                                <tr>
                                                    <td class="span2">学号</td>
                                                    <td><?php echo ($stuinfo["stu_number"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">姓名</td>
                                                    <td><?php echo ($stuinfo["stu_name"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">性别</td>
                                                    <td><?php echo ($stuinfo["stu_sex"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">联系方式</td>
                                                    <td><?php echo ($stuinfo["stu_phone"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">邮箱</td>
                                                    <td><?php echo ($stuinfo["stu_email"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">QQ</td>
                                                    <td><?php echo ($stuinfo["stu_QQ"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">工作单位</td>
                                                    <td><?php echo ($stuinfo["stu_workplace"]); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">学习经历</td>
                                                    <td><?php echo htmlspecialchars_decode($stuinfo['stu_studyexperience']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">工作经历</td>
                                                    <td><?php echo htmlspecialchars_decode($stuinfo['stu_workexperience']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">论文、项目与获奖</td>
                                                    <td><?php echo htmlspecialchars_decode($stuinfo['stu_honor']); ?></td>
                                                </tr>
                                                <tr>
                                                    <td class="span2">自我评价</td>
                                                    <td><?php echo htmlspecialchars_decode($stuinfo['stu_selfvalue']); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
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