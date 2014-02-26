<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/css/admin.css" rel="stylesheet" />
<script src="__PUBLIC__/jquery.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/jscolor.js"></script>
<script type="text/javascript">
var max_i='<?php echo ($max); ?>';
var max_id=Number(max_i)+1;
function u(action)
	{
		return site+'/index.php?m=Admin&a='+action;	
	}
</script>
<script type="text/javascript" src="__PUBLIC__/jUploader.min.js"></script>
<script type="text/javascript" src="__PUBLIC__/jquery.sortable.js"></script>
<script src="__PUBLIC__/admin.js" type="text/javascript"></script>
<title>QuoraCms后台管理面板登录-Powered by QuoraCms!</title>
</head>

<body>
<div class="title">分类设置：</div>
<div class="h"></div>
<form action="<?php echo U('Admin/category_cfg_receive'); ?>" method="post" id="cfg_form" enctype="multipart/form-data" >
<div class="tip">当前问题分类(可拖动排序)：</div>
<div id="cate_list">
    <?php foreach(F('category') as $k=>$v)
        {
            echo '<div class="cate_wrapper" id="cate_'.$v['id'].'">
            <a class="del_cate">删除</a>
            <a class="tip">1.该分类名称:</a><input type="text" name="cate[]" class="input" value="'.$v['title'].'" /><br />
            <a class="tip">该分类背景色(鼠标hover时箭头背景颜色):</a><input type="text" name="color[]" class="color" value="'.$v['color'].'" /><br />
            <a class="tip">上传该分类logo(110*80)：</a><input type="file" name="thumb[]" class="upload_thumb" />
            <div class="tip">该分类详细介绍文字：</div>
            <textarea name="describe[]">'.$v['describe'].'</textarea>
            <input type="hidden" name="thumb_hidden[]" value="'.$v['thumb'].'" />
        </div>';
        } ?>
</div>
<input type="hidden" value="" id="cate_arr" name="cate_arr" />
</form>
<div class="clear"></div>
    <div class="rect_button add_cate">新增分类</div>
    <div class="rect_button" id="cfg_sub" style="float:left">保存</div>
<br />
<br />
<br />
<br />
</body>
</html>