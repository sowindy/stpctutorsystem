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
                                        <li class="active">
						<a href="<?php echo U('index');?>">
							<i class="icon-dashboard"></i>
							<span class="menu-text"> 首页 </span>
						</a>
					</li>

					<li>
						<a href="<?php echo U('info');?>">
							<i class="icon-text-width"></i>
							<span class="menu-text"> 企业信息 </span>
						</a>
					</li>

					<li>
						<a href="#" class="dropdown-toggle">
							<i class="icon-desktop"></i>
							<span class="menu-text"> 岗位 </span>

							<b class="arrow icon-angle-down"></b>
						</a>

						<ul class="submenu">
							<li>
								<a href="<?php echo U('position');?>">
									<i class="icon-double-angle-right"></i>
									岗位列表
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
                                    <?php foreach($stuinfo as $oneposition): ?>
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <td style="text-align: right">职位名称：</td>
                                                <td colspan="1"><?php echo ($oneposition["station"]); ?></td>
                                                <td><a href="<?php echo U('Practice/choosestu',array('id'=>$oneposition['practice_id']));?>" class="btn btn-mini btn-info">查看申请<span class="badge badge-important"><?php echo ($oneposition["signup"]); ?></span></a></td>
                                                <td style="text-align: right">职位可接受最多人数：</td>
                                                <td><?php echo ($oneposition["num"]); ?></td>
                                            </tr>
                                            <?php if($oneposition['stuinfo']): ?>
                                            <tr>
                                                <td>编号</td>
                                                <td>学号</td>
                                                <td>姓名</td>
                                                <td>邮箱</td>
                                                <td style="width: 25%">操作</td>
                                            </tr>
                                            <?php else: ?>
                                            <tr>
                                                <td colspan="5">暂时没有通过的学生</td>
                                            </tr>
                                            <?php endif;?>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;foreach($oneposition['stuinfo'] as $one): ?>
                                            <tr>
                                                <td><?php echo ($i); ?></td>
                                                <td><?php echo ($one["stu_number"]); ?></td>
                                                <td><?php echo ($one["stu_name"]); ?></td>
                                                <td><?php echo ($one["stu_email"]); ?></td>
                                                <td style="width: 25%">
                                                    <a href="#detail<?php echo ($one["id"]); ?>" class="btn btn-small btn-success" data-toggle="modal">查看详细</a>
                                                    <div id="detail<?php echo ($one["id"]); ?>" class="modal hide fade span8" style="left: 20%" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                                <h3 id="myModalLabel">学生详细信息</h3>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="span7 infobox-container">
                                                                <div class="infobox infobox-green infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">姓名</span>
                                                                                <div class="infobox-content"><?php echo ($one["stu_name"]); ?></div>
                                                                        </div>
                                                                </div>

                                                                <div class="infobox infobox-blue infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">性别</span>
                                                                                <div class="infobox-content"><?php if($one['sex']): ?>男<?php else: ?>女<?php endif; ?></div>
                                                                        </div>
                                                                </div>

                                                                <div class="infobox infobox-brown infobox-small infobox-dark" style="width: 200px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">邮箱</span>
                                                                                <div class="infobox-content">
                                                                                    <?php echo ($one["stu_email"]); ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <div class="infobox infobox-green"  style="width: 300px">
                                                                        <div class="infobox-data">
                                                                            <span class="infobox-data-number">手机</span>
                                                                                <div class="infobox-content"><?php echo ($one["stu_phone"]); ?></div>
                                                                        </div>
                                                                </div>
                                                                <div class="infobox infobox-green"  style="width: 300px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">QQ</span>
                                                                                <div class="infobox-content"><?php echo ($one["stu_QQ"]); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php if($one['stu_workplace']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 614px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">工作单位</span>
                                                                                <div class="infobox-content" style="width: 580px">
                                                                                    <?php echo htmlspecialchars_decode($one['stu_workplace']); ?>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <?php if($one['stu_studyexperience']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 614px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">学习经验</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['stu_studyexperience']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif;?>
                                                                <?php if($one['stu_workexperience']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 614px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">工作经验</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['stu_workexperience']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if($one['stu_honor']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 614px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">论文、项目与获奖</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['stu_honor']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif; ?>
                                                                <?php if($one['stu_selfvalue']): ?>
                                                                <div class="infobox infobox-blue"  style="width: 614px">
                                                                        <div class="infobox-data">
                                                                                <span class="infobox-data-number">自我评价</span>
                                                                                <div class="infobox-content"><?php echo htmlspecialchars_decode($one['stu_selfvalue']); ?></div>
                                                                        </div>
                                                                </div>
                                                                <?php endif; ?>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                                <button class="btn btn-primary" data-dismiss="modal" aria-hidden="true">关闭</button>
                                                        </div>
                                                    </div>
                                                    <a href="#yes<?php echo ($one["id"]); ?>" class="btn btn-small btn-info" data-toggle="modal">结束实习</a>
                                                    <div id="yes<?php echo ($one["id"]); ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                            <h3 id="myModalLabel">您确定<?php echo ($one["stu_name"]); ?>实习结束吗？</h3>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <form action="<?php echo U('Practice/endpractice');?>" method="post">
                                                                <input type="hidden" name="ha" value="<?php echo ($ha); ?>" />
                                                                <input type="hidden" name="stu_id" value="<?php echo ($one["id"]); ?>" />
                                                                <input type="hidden" name="practice_id" value="<?php echo ($oneposition["practice_id"]); ?>" />
                                                                <button class="btn" data-dismiss="modal" aria-hidden="true">取消</button>
                                                                <button class="btn btn-success" aria-hidden="true">确定</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php $i++;endforeach; ?>
                                        </tbody>
                                    </table>
                                    <?php endforeach; ?>
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