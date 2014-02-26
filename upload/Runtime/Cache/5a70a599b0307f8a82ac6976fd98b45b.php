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
					<li>
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

						<ul class="submenu" style="display: block">
							<li class="active">
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
                                    <table class="table table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>公司名称</th>
                                                <th>实习岗位</th>
                                                <th>联系人</th>
                                                <th>最大人数</th>
                                                <th>已招收人数</th>
                                                <th>状态</th>
                                                <th style="width: 22%">操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($corporate as $one): ?>
                                            <?php $i=1; foreach($one['stations'] as $onestation): ?>
                                            <tr>
                                                <?php if($i == 1): ?>
                                                <td rowspan="<?php echo count($one['stations']) ?>"><?php echo ($one["corporate"]); ?></td>
                                                <?php endif; ?>
                                                <td><?php echo ($onestation["station"]); ?></td>
                                                <td><?php echo ($onestation["contacts"]); ?></td>
                                                <td><?php echo ($onestation["num"]); ?></td>
                                                <td><?php echo ($onestation["stunumber"]); ?></td>
                                                <td>
                                                    <?php if($onestation['status'] == 1): ?>
                                                    <label class="badge badge-success"> 已发布</label>
                                                    <?php else: ?>
                                                    <label class="badge badge-important"> 未发布</label>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <a href="#" class="btn btn-mini btn-success">查看详细</a>
                                                    <a href="<?php echo U('editpractice',array('id'=>$onestation['uid'],'pid'=>$onestation['id']));?>" class="btn btn-mini btn-info">编辑</a>
                                                    <a href="<?php echo U('delposition',array('id'=>$onestation['id']));?>" class="btn btn-mini btn-danger">删除</a>
                                                    <?php if($onestation['uid'] == $adminuid): ?>
                                                    <?php if($onestation['status'] == 1): ?>
                                                    <a href="<?php echo U('calcelpublishposition',array('id'=>$onestation['id']));?>" class="btn btn-mini btn-purple">取消发布</a>
                                                    <?php else: ?>
                                                    <a href="<?php echo U('publishposition',array('id'=>$onestation['id']));?>" class="btn btn-mini btn-pink">发布职位</a>
                                                    <?php endif; ?>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php $i++;endforeach; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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