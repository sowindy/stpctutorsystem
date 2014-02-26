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
					<li>
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

						<ul class="submenu" style="display: block">
							<li class="active">
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
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <td>编号</td>
                                                <td>公司</td>
                                                <td>联系人姓名</td>
                                                <td>联系电话/手机</td>
                                                <td>邮箱</td>
                                                <td>实习岗位</td>
                                                <td>操作</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach($all_publish_practice as $one): ?>
                                            <tr>
                                                <td><?php echo ($i); ?></td>
                                                <td><?php echo ($one["corporate"]); ?></td>
                                                <td><?php echo ($one["contacts"]); ?></td>
                                                <td><?php echo ($one["phone"]); ?><?php if($one['phone']&&$one['tel']): ?>/<?php endif; ?><?php echo ($one["tel"]); ?></td>
                                                <td><?php echo ($one["email"]); ?></td>
                                                <td><?php echo ($one["station"]); ?></td>
                                                <td>
                                                    <a href="#detail<?php echo ($one["id"]); ?>" class="btn btn-success btn-small" data-toggle="modal">查看详细</a>
                                                    <div id="detail<?php echo ($one["id"]); ?>" class="modal hide fade span8" style="left: 20%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h3 id="myModalLabel">实习单位详细信息</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="span7 infobox-container">
                                                                <div class="infobox infobox-green infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">单位</span>
                                                                                <div class="infobox-content"><?php echo ($one["corporate"]); ?></div>
                                                                        </div>
                                                                </div>

                                                                <div class="infobox infobox-blue infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">联系人</span>
                                                                                <div class="infobox-content"><?php echo ($one["contacts"]); ?></div>
                                                                        </div>
                                                                </div>

                                                                <div class="infobox infobox-brown infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">岗位</span>
                                                                                <div class="infobox-content">
                                                                                    <?php echo ($one["station"]); ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="infobox infobox-green"  style="width: 300px">
                                                                        <div class="infobox-data">
                                                                            <span class="infobox-data-number">手机/固话</span>
                                                                                <div class="infobox-content"><?php echo ($one["phone"]); ?><?php if($one['phone']&&$one['tel']): ?>/<?php endif; ?><?php echo ($one["tel"]); ?></div>
                                                                        </div>
                                                                </div>
                                                                <div class="infobox infobox-green"  style="width: 300px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">邮箱</span>
                                                                                <div class="infobox-content"><?php echo ($one["email"]); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php if($one['about']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 600px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">公司简介</span>
                                                                                <div class="infobox-content" style="width: 580px">
                                                                                    <?php echo htmlspecialchars_decode($one['corporate_about']); ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <?php if($one['course']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 600px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">担任课程</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['course']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <?php if($one['demand']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 600px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">实习岗位要求</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['demand']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if($one['num']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 600px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">岗位招收人数</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['num']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
                                                        </div>
                                                    </div>
                                                    <?php if($one['operate']): ?>
                                                    <a href="#choose<?php echo ($one["id"]); ?>" class="btn btn-info btn-small" data-toggle="modal">选此单位</a>
                                                    <div id="choose<?php echo ($one["id"]); ?>" class="modal hide fade span8" style="left: 20%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h3 id="myModalLabel">您确定选择<?php echo ($one["corporate"]); ?>吗？</h3>
                                                        </div>
                                                        <form method="post" action="<?php echo U('Stu/practicehandler');?>">
                                                        <div class="modal-body">
                                                            <input type="hidden" name="ha" value="<?php echo ($ha); ?>" />
                                                            <input type="hidden" name="practice_id" value="<?php echo ($one["id"]); ?>" />
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">取消</button>
                                                                <button class="btn btn-success" aria-hidden="true">确定</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                    <?php else: ?>
                                                    <a href="#" class="btn btn-info btn-small disabled">选此单位</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php $i++;endforeach; ?>
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
                <script src="__BOOTJS__/jquery.autosize-min.js"></script>
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
                        $('textarea[class*=autosize]').autosize({append: "\n"});
                        $('#modal-wizard .modal-header').ace_wizard();
                        $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		</script>
	</body>
</html>