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
<div class="title">ucenter整合：</div>
<div class="h"></div>
<form action="<?php echo U('Admin/ucenter_cfg_receive'); ?>" method="post" id="cfg_form">
<div class="tip">
1, 建议安装UTF-8编码版本的UCenter<br />
2, 在UCenter上创建应用(登录UCenter用户管理中心 -> 应用管理 -> 添加新应用 -> 自定义安装), 需填写的信息包括:<br />
   - 应用名称: 您的站点名称<br />
   - 应用的主URL: __SITE__<br />
   - 应用类型: 其他<br />
   - 应用接口文件名称: uc.php<br />
   - 是否开启同步登录: 是<br />
   - 是否接受通知: 是<br />
   填写完毕后点击提交，然后复制“应用的UCenter配置信息”<br />
3, 将第2步中复制的“应用的UCenter配置信息”粘贴在以下文本框文件中，并点击保存<br />
</div>
<div class="tip">
是否开启ucenter
<a class="radio"><input type="radio" name="ucenter_on" value="1" <?php if($setting['ucenter_on']==1){echo 'checked="checked"';} ?> />开启</a>
<a class="radio"><input type="radio" name="ucenter_on" value="0" <?php if($setting['ucenter_on']==0){echo 'checked="checked"';} ?>/>不开启</a>
</div>
<div class="tip">ucenter配置信息：</div>
<textarea name="ucenter_info" style="height:200px; width:300px">
<?php $a=file_get_contents(CONFIG_PATH.'/uc_config.php');
echo substr($a,35); ?>
</textarea>

</form>
<div class="rect_button" id="cfg_sub">保存</div><br />
<br />

</body>
</html>