<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/css/admin.css" rel="stylesheet" />
<script src="__PUBLIC__/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/admin.js" type="text/javascript"></script>
<title>QuoraCms后台管理面板-Powered by QuoraCms!</title>
</head>

<body>
<div class="title">邮箱配置：</div>
<div class="h"></div>
<form action="<?php echo U('Admin/email_cfg_receive'); ?>" method="post" id="cfg_form">
<div class="tip">系统邮件发送方式：</div>
<div class="tip">
<?php echo $setting['mail_mode']==2?'<a class="radio" id="mail_a"><input type="radio" name="mail_mode" value="1" />php函数自带的mail()函数发送邮件</a><a class="radio" id="smtp_a"><input type="radio" checked="checked" name="mail_mode" value="2" />quoracms自带的send_email()函数发送邮件(调用phpmailer)</a>':'<a class="radio" id="mail_a"><input type="radio" value="1" checked="checked" name="mail_mode" />php函数自带的mail()函数发送邮件</a><a class="radio" id="smtp_a"><input type="radio" name="mail_mode" value="2" />quoracms自带的send_email()函数发送邮件(调用phpmailer)</a>'; ?>
	
</div>
<div id="smtp">
<div class="tip">SMTP服务器：(例：smtp.126.com)</div>
<input type="text" name="mail_host" class="input" value="<?php echo ($setting["mail_host"]); ?>" />
<div class="tip">SMTP端口(系统默认为25)：</div>
<input type="text" name="mail_port" class="input" value="<?php echo ($setting["mail_port"]); ?>"/>
<div class="tip">SMTP邮箱：</div>
<input type="text" name="mail_addr" class="input" value="<?php echo ($setting["mail_addr"]); ?>"/>
<div class="tip">SMTP密码：</div>
<input type="text" name="mail_pwd" class="input" value="<?php echo ($setting["mail_pwd"]); ?>"/>
</div>
</form>
<div class="rect_button" id="cfg_sub">保存</div><br />
<br />

</body>
</html>