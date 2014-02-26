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
							<li>
								<a href="<?php echo U('position');?>">
									<i class="icon-double-angle-right"></i>
									所有岗位
								</a>
							</li>

                                                        <li class="active">
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
                                        <form class="form-horizontal" id="form" method="post" action="<?php echo U('newpositionhandler');?>" />
                                            <input type="hidden" name="ha" value="<?php echo ($ha); ?>" />
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">联系人姓名：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="contacts" class="span6" id="form-field-1" placeholder="如“张三”" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">手机：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="phone" class="span6" id="form-field-1" placeholder="如“13721093421”" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">办公室电话：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="tel" class="span6" id="form-field-1" placeholder="如“0551-63600110”" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">EMAIL：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="email" id="form-field-1" class="span6" placeholder="如“youname@domain”" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">岗位名称：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="text" name="station" class="span6" id="form-field-1" placeholder="" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">招收人数：</label>

                                                    <div class="controls">
                                                        <div class="span6">
                                                            <input type="number" name="num" class="span6" id="form-field-1" placeholder="" value="" />
                                                        </div>
                                                    </div>
                                            </div>
                                            
                                            <div class="control-group">
                                                    <label class="control-label" for="form-field-2">职位要求：</label>

                                                    <div class="controls">
                                                            <input type="hidden" id="practice_demand" name="demand" value="" />
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
			
			})
                        $('textarea[class*=autosize]').autosize({append: "\n"});
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
                    
                    $('#form').submit(
                        function(){
                            $('#practice_demand').val($('#demand').html());
                            $('#corporate_about').val($('#about').html());
                        }
                    );
		</script>
	</body>

	</body>
</html>