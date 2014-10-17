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
                                        
                                        <li  class="active">
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
                                    <div class="span8 offset1">
                                        <form class="form-horizontal" id="form" method="post" action="<?php echo U('edittutorhandler');?>" />
                                            <input type="hidden" name="ha" value="<?php echo ($ha); ?>" />
                                            <input type="hidden" name="id" value="<?php echo ($id); ?>" />
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">姓名：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="name" class="span6" id="form-field-1" placeholder="如“张三”" value="<?php echo ($tutorinfo["name"]); ?>" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">性别：</label>
                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input name="sex" type="radio" checked value="1" />
                                                            <span class="lbl span1">男</span>
                                                            <input name="sex" type="radio" value="0" />
                                                            <span class="lbl span1 offset1">女</span>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">职称：</label>
                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input name="position" type="radio" checked value="1" />
                                                            <span class="lbl span1">教授</span>
                                                            <input name="position" type="radio" value="2" />
                                                            <span class="lbl span1 offset1">副教授</span>
                                                            <input name="position" type="radio" value="3" />
                                                            <span class="lbl span1 offset1">讲师</span>
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">研究方向：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="direction" id="form-field-1" class="span6" placeholder="多个方向，请以逗号隔开" value="<?php echo ($tutorinfo["direction"]); ?>" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">手机：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="phone" class="span6" id="form-field-1" placeholder="如“13721093421”" value="<?php echo ($tutorinfo["phone"]); ?>" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">办公室电话：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="tel" class="span6" id="form-field-1" placeholder="如“0551-63600110”" value="<?php echo ($tutorinfo["tel"]); ?>" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">EMAIL：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="email" id="form-field-1" class="span6" placeholder="如“youname@ustc.edu.cn”" value="<?php echo ($tutorinfo["email"]); ?>" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">担任课程：</label>

                                                    <div class="controls">
                                                            <input type="hidden" id="tutor_course" name="course" value="" />
                                                            <div class="span6">
                                                                    <div class="widget-box">
                                                                            <div class="widget-header widget-header-small  header-color-green">
                                                                                    <div class="widget-toolbar">
                                                                                            <a href="#" data-action="collapse">
                                                                                                    <i class="icon-chevron-up"></i>
                                                                                            </a>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="widget-body">
                                                                                    <div class="widget-main no-padding">
                                                                                            <div class="wysiwyg-editor editor_form" id="course"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">论文：</label>

                                                    <div class="controls">
                                                            <input type="hidden" id="tutor_paper" name="paper" value="" />
                                                            <div class="span6">
                                                                    <div class="widget-box">
                                                                            <div class="widget-header widget-header-small  header-color-green">
                                                                                    <div class="widget-toolbar">
                                                                                            <a href="#" data-action="collapse">
                                                                                                    <i class="icon-chevron-up"></i>
                                                                                            </a>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="widget-body">
                                                                                    <div class="widget-main no-padding">
                                                                                            <div class="wysiwyg-editor editor_form" id="paper"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">项目：</label>

                                                    <div class="controls">
                                                            <input type="hidden" id="tutor_project" name="project" value="" />
                                                            <div class="span6">
                                                                    <div class="widget-box">
                                                                            <div class="widget-header widget-header-small  header-color-green">
                                                                                    <div class="widget-toolbar">
                                                                                            <a href="#" data-action="collapse">
                                                                                                    <i class="icon-chevron-up"></i>
                                                                                            </a>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="widget-body">
                                                                                    <div class="widget-main no-padding">
                                                                                            <div class="wysiwyg-editor editor_form" id="project"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">学生要求：</label>

                                                    <div class="controls">
                                                            <input type="hidden" id="tutor_demand" name="demand" value="" />
                                                            <div class="span6">
                                                                    <div class="widget-box">
                                                                            <div class="widget-header widget-header-small  header-color-green">
                                                                                    <div class="widget-toolbar">
                                                                                            <a href="#" data-action="collapse">
                                                                                                    <i class="icon-chevron-up"></i>
                                                                                            </a>
                                                                                    </div>
                                                                            </div>

                                                                            <div class="widget-body">
                                                                                    <div class="widget-main no-padding">
                                                                                            <div class="wysiwyg-editor editor_form" id="demand"></div>
                                                                                    </div>
                                                                            </div>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="offset6">
                                                <button class="btn btn-success">提交信息</button>
                                            </div>
                                        </form>
                                    </div>
				</div><!--/.page-content-->
			</div><!--/.main-content-->
		</div><!--/.main-container-->

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-small btn-inverse">
			<i class="icon-double-angle-up icon-only bigger-110"></i>
		</a>



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
                
                <script src="__BOOTJS__/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="__BOOTJS__/jquery.ui.touch-punch.min.js"></script>
		<script src="__BOOTJS__/markdown/markdown.min.js"></script>
		<script src="__BOOTJS__/markdown/bootstrap-markdown.min.js"></script>
		<script src="__BOOTJS__/jquery.hotkeys.min.js"></script>
		<script src="__BOOTJS__/bootstrap-wysiwyg.min.js"></script>
		<script src="__BOOTJS__/bootbox.min.js"></script>
                
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
			
			});
                        $('#modal-wizard .modal-header').ace_wizard();
                        $('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
		</script>
                <script type="text/javascript">
			$(function(){
                            
                            $('.editor_form').css({'height':'200px'}).ace_wysiwyg({
                                    toolbar_place: function(toolbar) {
                                            return $(this).closest('.widget-box').find('.widget-header').prepend(toolbar);
                                    },
                                    toolbar:
                                    [
                                            'bold',
                                            {name:'italic' , title:'Change Title!', icon: 'icon-leaf'},
                                            'strikethrough',
                                            'underline',
                                            null,
                                            'insertunorderedlist',
                                            'insertorderedlist',
                                            null,
                                            'justifyleft',
                                            'justifycenter',
                                            'justifyright'
                                    ],
                                    speech_button:false
                            });

                            //Add Image Resize Functionality to Chrome and Safari
                            //webkit browsers don't have image resize functionality when content is editable
                            //so let's add something using jQuery UI resizable
                            //another option would be opening a dialog for user to enter dimensions.
                            if ( typeof jQuery.ui !== 'undefined' && /applewebkit/.test(navigator.userAgent.toLowerCase()) ) {

                                    var lastResizableImg = null;
                                    function destroyResizable() {
                                            if(lastResizableImg == null) return;
                                            lastResizableImg.resizable( "destroy" );
                                            lastResizableImg.removeData('resizable');
                                            lastResizableImg = null;
                                    }

                                    var enableImageResize = function() {
                                            $('.wysiwyg-editor')
                                            .on('mousedown', function(e) {
                                                    var target = $(e.target);
                                                    if( e.target instanceof HTMLImageElement ) {
                                                            if( !target.data('resizable') ) {
                                                                    target.resizable({
                                                                            aspectRatio: e.target.width / e.target.height,
                                                                    });
                                                                    target.data('resizable', true);

                                                                    if( lastResizableImg != null ) {//disable previous resizable image
                                                                            lastResizableImg.resizable( "destroy" );
                                                                            lastResizableImg.removeData('resizable');
                                                                    }
                                                                    lastResizableImg = target;
                                                            }
                                                    }
                                            })
                                            .on('click', function(e) {
                                                    if( lastResizableImg != null && !(e.target instanceof HTMLImageElement) ) {
                                                            destroyResizable();
                                                    }
                                            })
                                            .on('keydown', function() {
                                                    destroyResizable();
                                            });
                                }

                                    enableImageResize();

                                    /**
                                    //or we can load the jQuery UI dynamically only if needed
                                    if (typeof jQuery.ui !== 'undefined') enableImageResize();
                                    else {//load jQuery UI if not loaded
                                            $.getScript($assets+"/js/jquery-ui-1.10.3.custom.min.js", function(data, textStatus, jqxhr) {
                                                    if('ontouchend' in document) {//also load touch-punch for touch devices
                                                            $.getScript($assets+"/js/jquery.ui.touch-punch.min.js", function(data, textStatus, jqxhr) {
                                                                    enableImageResize();
                                                            });
                                                    } else	enableImageResize();
                                            });
                                    }
                                    */
                            }

                    });
                    $(function(){
                            $("input[name='sex'][value='<?php echo ($tutorinfo["sex"]); ?>']").attr("checked", true);
                            $("input[name='position'][value='<?php echo ($tutorinfo["position"]); ?>']").attr("checked", true);
                            $('#paper').append("<?php echo htmlspecialchars_decode($tutorinfo['paper']); ?>");
                            $('#demand').append("<?php echo htmlspecialchars_decode($tutorinfo['demand']); ?>");
                            $('#project').append("<?php echo htmlspecialchars_decode($tutorinfo['project']); ?>");
                            $('#course').append("<?php echo htmlspecialchars_decode($tutorinfo['course']); ?>");
                    });
                    $('#form').submit(
                        function(){
                            $('#tutor_course').val($('#course').html());
                            $('#tutor_paper').val($('#paper').html());
                            $('#tutor_project').val($('#project').html());
                            $('#tutor_demand').val($('#demand').html());
                        }
                    );
		</script>
	</body>

	</body>
</html>