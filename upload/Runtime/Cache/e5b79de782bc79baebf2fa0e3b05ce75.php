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
<div class="title">站点配置：</div>
<div class="h"></div>
<form action="<?php echo U('Admin/site_cfg_receive'); ?>" method="post" id="cfg_form">
<div class="tip">一键切换当前网站模式：</div>
<div class="tip">
<?php echo $setting['is_quora']==0?'<a class="radio"><input type="radio" name="is_quora" value="1" />社会化问答模式</a><a class="radio"><input type="radio" checked="checked" name="is_quora" value="0" />论坛模式（此操作将会把全站“问题”字样变为“帖子”，并关闭“设为答案”功能）</a>':'<a class="radio"><input type="radio" value="1" checked="checked" name="is_quora" />社会化问答模式</a><a class="radio"><input type="radio" name="is_quora" value="0" />论坛模式（此操作将会把全站“问题”字样变为“帖子”，并关闭“设为答案”功能）</a>'; ?>
</div>
<div class="tip">是否关闭注册功能：</div>
<div class="tip">
<?php echo $setting['register_close']==0?'<a class="radio"><input type="radio" name="register_close" value="1" />关闭</a><a class="radio"><input type="radio" checked="checked" name="register_close" value="0" />开放</a>':'<a class="radio"><input type="radio" value="1" checked="checked" name="register_close" />关闭</a><a class="radio"><input type="radio" name="register_close" value="0" />开放</a>'; ?>
</div>
<div class="tip">注册时是否启用邮箱验证：</div>
<div class="tip">
<?php echo $setting['ismailverify']==0?'<a class="radio"><input type="radio" checked="checked" name="ismailverify" value="0" />不启用</a><a class="radio"><input type="radio" name="ismailverify" value="1" />启用</a>':'<a class="radio"><input type="radio" value="0" name="ismailverify" />不启用</a><a class="radio"><input type="radio" name="ismailverify" checked="checked" value="1" />启用</a>'; ?>
</div>
<div class="tip">是否允许对自己的问题回复：</div>
<div class="tip">
<?php echo $setting['reply_self']==0?'<a class="radio"><input type="radio" name="reply_self" value="1" />允许</a><a class="radio"><input type="radio" checked="checked" name="reply_self" value="0" />不允许</a>':'<a class="radio"><input type="radio" value="0" checked="checked" name="reply_self" />允许</a><a class="radio"><input type="radio" name="reply_self" value="0" />不允许</a>'; ?>
	
</div>
<div class="tip">问题回复允许最短字数：</div>
<input type="text" name="reply_min_wordcount" class="input" value="<?php echo ($setting["reply_min_wordcount"]); ?>" />
<div class="tip">隐藏回复最低“无帮助”数：</div>
<input type="text" name="helpless_min_count" class="input" value="<?php echo ($setting["helpless_min_count"]); ?>" />
<div class="tip">每页回复显示条数：</div>
<input type="text" name="reply_per_page" class="input" value="<?php echo ($setting["reply_per_page"]); ?>"/>
<div class="tip">是否允许对自己的回复进行“赞成”、“反对”、“没有帮助”操作：</div>
<div class="tip">
<?php echo $setting['agree_self']==0?'<a class="radio"><input type="radio" name="agree_self" value="1" />允许</a><a class="radio"><input type="radio" checked="checked" name="agree_self" value="0" />不允许</a>':'<a class="radio"><input type="radio" checked="checked" value="1" name="agree_self" />允许</a><a class="radio"><input type="radio" name="agree_self" value="0" />不允许</a>'; ?>
</div>

<div class="tip">问题链接打开方式：</div>
<div class="tip">
<?php echo $setting['link_open']=='_blank'?'<a class="radio"><input type="radio" name="link_open" value="_self" />当前窗口</a><a class="radio"><input type="radio" checked="checked" name="link_open" value="_blank" />新窗口</a>':'<a class="radio"><input type="radio" checked="checked" value="_self" name="link_open" />当前窗口</a><a class="radio"><input type="radio" name="link_open" value="_blank" />新窗口</a>'; ?>
</div>

<div class="tip">每页显示问题数：</div>
<input type="text" name="question_per_page" class="input" value="<?php echo ($setting["question_per_page"]); ?>" />

<div class="tip">每页显示话题数：</div>
<input type="text" name="topic_per_page" class="input" value="<?php echo ($setting["topic_per_page"]); ?>" />

<div class="tip">站点右侧列表缓存个数：</div>
<input type="text" name="side_list_count" class="input" value="<?php echo ($setting["side_list_count"]); ?>" />

<div class="tip">站点右侧列表缓存时间(单位:秒)：</div>
<input type="text" name="side_list_cachetime" class="input" value="<?php echo ($setting["side_list_cachetime"]); ?>" />

<div class="tip">用户每发表一个问题增加积分：</div>
<input type="text" name="publish_add_score" class="input" value="<?php echo ($setting["publish_add_score"]); ?>" />

<div class="tip">用户每回复一个问题增加积分：</div>
<input type="text" name="reply_add_score" class="input" value="<?php echo ($setting["reply_add_score"]); ?>" />

<div class="tip">用户回复被采纳为最佳答案增加积分：</div>
<input type="text" name="adopted_add_score" class="input" value="<?php echo ($setting["adopted_add_score"]); ?>" />

<div class="tip">注册时是否显示验证码：</div>
<div class="tip">
<?php echo $setting['register_code']==0?'<a class="radio"><input type="radio" name="register_code" value="1" />显示</a><a class="radio"><input type="radio" checked="checked" name="register_code" value="0" />不显示</a>':'<a class="radio"><input type="radio" checked="checked" value="1" name="register_code" />显示</a><a class="radio"><input type="radio" name="register_code" value="0" />不显示</a>'; ?>
</div>
<div class="tip">是否设置为邀请注册：</div>
<div class="tip">
<?php echo $setting['is_invite_register']==0?'<a class="radio"><input type="radio" name="is_invite_register" value="1" />邀请注册</a><a class="radio"><input type="radio" checked="checked" name="is_invite_register" value="0" />普通注册</a>':'<a class="radio"><input type="radio" value="0" checked="checked" name="is_invite_register" />邀请注册</a><a class="radio"><input type="radio" name="is_invite_register" value="0" />普通注册</a>'; ?>
</div>
<div class="tip">新注册用户赠送邀请码数量：</div>
<input type="text" name="invite_count_available" class="input" value="<?php echo ($setting["invite_count_available"]); ?>" />
</form>
<div class="rect_button" id="cfg_sub">保存</div><br />
<br />

</body>
</html>