<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/css/admin.css" rel="stylesheet" />
<script src="__PUBLIC__/jquery.js" type="text/javascript"></script>
<script src="__PUBLIC__/admin.js" type="text/javascript"></script>
<title>QuoraCms后台管理面板登录-Powered by QuoraCms!</title>
</head>

<body>
<form action="<?php echo U('Admin/basic_info_receive'); ?>" method="post" id="cfg_form">
<div class="tip">站点名称：</div>
<input type="text" class="input" name="site_name" value="<?php echo ($setting["site_name"]); ?>" />
<div class="tip">网站简介(Description)：</div>
<textarea name="site_description"><?php echo ($setting["site_description"]); ?></textarea>
<div class="tip">网站关键词(Keywords)，相邻关键词请用英文状态下逗号隔开：</div>
<textarea name="site_keywords"><?php echo ($setting["site_keywords"]); ?></textarea>
<div class="tip">站点备案号：</div>
<input type="text" name="icp" class="input" value="<?php echo ($setting["icp"]); ?>"/>
</form>
<div class="rect_button" id="cfg_sub">保存</div>
</body>
</html>