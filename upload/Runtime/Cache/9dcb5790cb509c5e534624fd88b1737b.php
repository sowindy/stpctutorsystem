<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/css/admin.css" rel="stylesheet" />
<script src="__PUBLIC__/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/admin.js" type="text/javascript"></script>
<title>QuoraCms后台管理面板登录-Powered by QuoraCms!</title>
</head>

<body id="login_body">
	<div id="main">
    	<img id="logo" src="__PUBLIC__/css/admin_logo.png" />
        <form id="login_panel" action="<?php echo U('Admin/login_sub'); ?>" method="post">
            <input type="text" class="input_text" value="用户名" title="用户名" name="admin_name" id="admin_name" />
            <input type="password" class="input_text" value="管理员密码" title="管理员密码" name="admin_pwd" id="admin_pwd" />
            <div id="login_submit"></div>
        </form>
        <div id="error"></div>
        <?php echo ($script); ?>
    </div>
</body>
</html>