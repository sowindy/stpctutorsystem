<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="keywords" content="<?php echo $keywords==NULL?$setting['site_keywords']:$keywords; ?>" />
	<meta name="description" content="<?php echo $description==NULL?$setting['site_description']:$description; ?>"  />
    <meta name="author" content="" />
    <meta name="copyright" content="" />
    <link rel="shortcut icon" href="__PUBLIC__/css/favicon.ico" />
    <link href="__PUBLIC__/css/core.css" rel="stylesheet" />
    <script src="__PUBLIC__/jquery.js" type="text/javascript"></script>
    <script type="text/javascript" src="__PUBLIC__/qcsBox.js"></script>
    <script type="text/javascript" src="__PUBLIC__/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
		var site='__SITE__';
		var public='__PUBLIC__';
		var uid='<?php echo ($user['id']); ?>';
		var sign='<?php echo ($sign); ?>';
		var name='<?php echo ($user['name']); ?>';
		function tip(html)
			{
				var top_tip=$('#top_tip');
				top_tip.css({top:-36});
				$('#alert_mid').html(html);
				top_tip.stop(true,true);
				top_tip.animate({top:0},400).delay(2000).animate({top:-36},400);
			}
		function html_encode(str)  
			{  
			  var s = "";  
			  if (str.length == 0) return "";  
			  s = str.replace(/&/g, "&gt;");  
			  s = s.replace(/</g, "&lt;");  
			  s = s.replace(/>/g, "&gt;");  
			  s = s.replace(/ /g, "&nbsp;");  
			  s = s.replace(/\'/g, "&#39;");  
			  s = s.replace(/\"/g, "&quot;");  
			  s = s.replace(/\n/g, "<br>");  
			  return s;  
			}
		function u(action)
			{
				var module=arguments[1]||'<?php echo MODULE_NAME; ?>';  
				return site+'/index.php?m='+module+'&a='+action;	
			}		  	
	</script>
    <script src="__PUBLIC__/global.js" type="text/javascript"></script>
<title><?php echo ($user['newmsg']!=0||$user['newnotice']!=0)?'('.($user['newmsg']+$user['newnotice']).')'.$title:$title; ?></title>
</head>

<body>
	<!--[if lte IE 6]>
    <div id="ie6"></div>
     <![endif]-->
	<div id="header">
    	<a href="__SITE__" id="logo"></a>
        <form action="__SITE__/index.php" id="search_f" method="get" name="search_f">
        	<input type="hidden" name="m" value="Question"/><input type="hidden" name="a" value="search"/>
            <input type="text" speech="speech" class="focus" title="搜的一下，你就知道..." value="搜的一下，你就知道..." x-webkit-speech="x-webkit-speech" id="search_input" name="words" />
            <div id="ask">搜 索</div>
        </form>
        <a id="question_link" href="__SITE__">分类</a>
        <a id="topic_link" href="<?php echo U('Topic/index'); ?>" <?php if(MODULE_NAME=='Topic'){echo 'class="white"';} ?>>话题</a>
        <ul id="header_right">
            <?php if($_SESSION['type'] == 0 && $_SESSION['uid']): ?>
            <li id="stp_li">
                <a class="a_panel " href="#" id="">
                    <div style="background: url(__PUBLIC__/css/sprites.png) no-repeat 0px -1118px;margin: 0px auto;width: 20px;height: 16px;">
                        
                    </div>
                </a>
            </li>
            <?php elseif($_SESSION['type'] == 1): ?>
            <li id="stp_li">
                <a class="a_panel " href="<?php echo U('Stu/index');?>" id="">
                    <div style="background: url(__PUBLIC__/css/sprites.png) no-repeat 0px -1118px;margin: 0px auto;width: 20px;height: 16px;">
                        
                    </div>
                </a>
            </li>
            <?php elseif($_SESSION['type'] == 2): ?>
            <li id="stp_li">
                <a class="a_panel " href="<?php echo U('Tutor/index');?>" id="">
                    <div style="background: url(__PUBLIC__/css/sprites.png) no-repeat 0px -1118px;margin: 0px auto;width: 20px;height: 16px;">
                        
                    </div>
                </a>
            </li>
            <?php elseif($_SESSION['type'] == 3): ?>
            <li id="stp_li">
                <a class="a_panel " href="<?php echo U('Practice/index');?>" id="">
                    <div style="background: url(__PUBLIC__/css/sprites.png) no-repeat 0px -1118px;margin: 0px auto;width: 20px;height: 16px;">
                        
                    </div>
                </a>
            </li>
            <?php elseif($_SESSION['type'] == 4): ?>
            <li id="stp_li">
                <a class="a_panel " href="<?php echo U('Adminstpc/index');?>" id="">
                    <div style="background: url(__PUBLIC__/css/sprites.png) no-repeat 0px -1118px;margin: 0px auto;width: 20px;height: 16px;">
                        
                    </div>
                </a>
            </li>
            <?php endif; ?>
            <?php 
            if($user!=NULL)
            	{
                	echo '
                    <li id="publish_li"><a class="a_panel ';if(ACTION_NAME=='publish'){echo 'nav_white';} echo '" href="'.U('Question/publish').'"><div id="publish"></div></a></li>
                    <li id="msg_li"><a class="a_panel" ><div id="msg"></div></a></li>
                    <li id="user_li"><a class="a_panel ';if(MODULE_NAME=='User'){echo 'nav_white';} echo '" href="'.U('User/index').'"><div id="user"></div></a></li>
                    <li id="notice_li"><a class="a_panel" id="notice_a" ><div id="notice"></div></a></li>';
                    if($user['id']==1){echo '<li><a class="a_panel" href="'.U('Admin/login').'" target="_blank" ><div id="more"></div></a></li>';}
                    echo '<li id="logout_li"><a class="a_panel"><div id="logout"></div></a></li>
                    ';
                }else{
                	echo '<li><a href="'.U('Account/login').'" class="';
                        if(ACTION_NAME=='login'){echo 'a_hover';}else{echo 'right_a';}
                        echo '">登录</a></li><li><a href="'.U('Account/register').'" class="';
                        if(ACTION_NAME=='register'){echo 'a_hover';}else{echo 'right_a';}
                        echo '">注册</a></li>';
                	}
               ?> 
               
               
        </ul>
	</div>
    <?php if($user['newmsg']!=0)
   		{
        	echo '<script type="text/javascript" src="__PUBLIC__/flash_msg.js"></script>';
        }
        
   if($user['newnotice']!=0)
   		{
        	echo '<script type="text/javascript">var j=0;var n=$("#notice");function flash_notice(){ 
	$.browser.msie?(j%2==0?document.getElementById("notice").style.display="none":document.getElementById("notice").style.display="block"):(j%2==0?n.animate({opacity:0},200):n.animate({opacity:1},200));j++;} fno=setInterval("flash_notice()",400);</script>';
        } ?>
<div id="top_tip" align="center">
    <div id="alert_left"></div>
    <div id="alert_mid"></div>
    <div id="alert_right"></div>
</div>
<div id="cate_div">
	<?php foreach(F('category') as $k=>$v)
    	{
            echo '<a href="'.U('Index/clist?cid='.$v['id']).'">'.$v['title'].'</a>';
        } ?>
</div>
<?php if($_SESSION['type'] == 0 && $_SESSION['uid']): ?>        
<div id="stp_div" tabindex="2" style="background: #FFFFFF;position: absolute;left: 49%;top: 44px;margin-left: 210px;z-index: 100;border-right: 1px solid #C7CED6;border-bottom: 1px solid #B7BCC0;border-left: 1px solid #ddd;min-width: 265px;outline: none;display: none;">
    <a href="<?php echo U('Index/stu');?>" id="" style="display: block;height: 40px;line-height: 40px;border-bottom: 1px dotted #CCC;color: #D96C00;vertical-align: middle;padding-left: 15px;padding-right: 15px;font-size: 13px;text-decoration: none;">申请为学生</a>
    <a href="<?php echo U('Index/practice');?>" id="" style="display: block;height: 40px;line-height: 40px;border-bottom: 1px dotted #CCC;color: #D96C00;vertical-align: middle;padding-left: 15px;padding-right: 15px;font-size: 13px;text-decoration: none;">申请为实习单位</a>
    <a href="<?php echo U('Index/tutor');?>" id="" style="display: block;height: 40px;line-height: 40px;border-bottom: 1px dotted #CCC;color: #D96C00;vertical-align: middle;padding-left: 15px;padding-right: 15px;font-size: 13px;text-decoration: none;">申请为导师</a>
</div>
<?php endif;?>
<div id="newmsg_div" tabindex="2">
	<?php echo Session::get('message')==NULL?'<div class="no_notice">暂无新站内信...</div>':Session::get('message'); ?>
</div>
<div id="notice_div" tabindex="2">
    <?php echo Session::get('inform')==NULL?'<div class="no_notice">暂无新通知...</div>':($user['newnotice']!=0?Session::get('inform').'<div id="clear_notice">清除全部'.$user['newnotice'].'条通知</div>':Session::get('inform')); ?>    
</div>
<script type="text/javascript" src="__PUBLIC__/school.js"></script>
<script type="text/javascript" src="__PUBLIC__/choosebox.js"></script>
<script type="text/javascript" src="__PUBLIC__/jsCity.js"></script>
<script type="text/javascript">
var career="<?php echo ($user['career']); ?>";
function init(obj_1,val_1,obj_2,val_2,obj_3,val_3){var ar=["省份","城市","区或县"];var pindex=0;var cindex=0;$("<option value=''>"+ar[0]+"</option>").appendTo($("#"+obj_1));$("<option value=''>"+ar[1]+"</option>").appendTo($("#"+obj_2));$("<option value=''>"+ar[2]+"</option>").appendTo($("#"+obj_3));for(i=0;i<mp.length;i++){if(mp[i]==val_1){pindex=i;$("<option selected>"+mp[i]+"</option>").appendTo($("#"+obj_1))}else{$("<option>"+mp[i]+"</option>").appendTo($("#"+obj_1))}}if(pindex!=0){for(n=1;n<mc[pindex].length+1;n++){if(mc[pindex][n-1]==val_2){cindex=n;$("<option selected>"+mc[pindex][n-1]+"</option>").appendTo($("#"+obj_2))}else{$("<option>"+mc[pindex][n-1]+"</option>").appendTo($("#"+obj_2))}}}if(cindex!=0){for(m=0;m<mh[pindex][cindex-1].length;m++){if(mh[pindex][cindex-1][m]==val_3){$("<option selected>"+mh[pindex][cindex-1][m]+"</option>").appendTo($("#"+obj_3))}else{$("<option>"+mh[pindex][cindex-1][m]+"</option>").appendTo($("#"+obj_3))}}}$("#"+obj_1).change(function(){pindex=$("#"+obj_1).get(0).selectedIndex;$("#"+obj_2).empty();$("<option>"+ar[1]+"</option>").appendTo($("#"+obj_2));if(pindex!=0){for(k=0;k<mc[pindex-1].length;k++){$("<option>"+mc[pindex-1][k]+"</option>").appendTo($("#"+obj_2))}}$("#"+obj_3).empty();$("<option>"+ar[2]+"</option>").appendTo($("#"+obj_3))});$("#"+obj_2).change(function(){cindex=$("#"+obj_2).get(0).selectedIndex;$("#"+obj_3).empty();$("<option>"+ar[2]+"</option>").appendTo($("#"+obj_3));if(cindex!=0){for(j=0;j<mh[pindex-1][cindex-1].length;j++){$("<option>"+mh[pindex-1][cindex-1][j]+"</option>").appendTo($("#"+obj_3))}}})}
$(document).ready(function(e) {
    init("province","<?php echo $user['province']; ?>","city","<?php echo $user['city']; ?>","hometown","<?php echo $user['county']; ?>");
});
</script>
<script type="text/javascript" src="__PUBLIC__/user.js"></script>
<div id="user_nav">
        <a class="<?php if(ACTION_NAME=='index'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/index'); ?>">
        	<div id="n2" class="n <?php if(ACTION_NAME=='index'){echo 'm2';}else{echo 'n2';} ?>"></div>
            个人资料
        </a>
        <a class="<?php if(ACTION_NAME=='avatar'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/avatar'); ?>">
        	<div id="n9" class="n <?php if(ACTION_NAME=='avatar'){echo 'm9';}else{echo 'n9';} ?>"></div>
            头像设置
        </a>
        <a class="<?php if(ACTION_NAME=='letter'||ACTION_NAME=='letterview'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/letter'); ?>">
        	<div id="n3" class="n <?php if(ACTION_NAME=='letter'||ACTION_NAME=='letterview'){echo 'm3';}else{echo 'n3';} ?>"></div>
            站内信
        </a>
        <a class="<?php if(ACTION_NAME=='myask'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myask'); ?>">
        	<div id="n5" class="n <?php if(ACTION_NAME=='myask'){echo 'm5';}else{echo 'n5';} ?>"></div>
            我的提问
        </a>
        <a class="<?php if(ACTION_NAME=='myreply'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myreply'); ?>">
        	<div id="n6" class="n <?php if(ACTION_NAME=='myreply'){echo 'm6';}else{echo 'n6';} ?>"></div>
            我的回复
        </a>
        <a class="<?php if(ACTION_NAME=='myagree'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myagree'); ?>">
        	<div id="n4" class="n <?php if(ACTION_NAME=='myagree'){echo 'm4';}else{echo 'n4';} ?>"></div>
            我的赞成
        </a>
        <a class="<?php if(ACTION_NAME=='myagainst'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myagainst'); ?>">
        	<div id="n10" class="n <?php if(ACTION_NAME=='myagainst'){echo 'm10';}else{echo 'n10';} ?>"></div>
            我的反对
        </a>
        <a class="<?php if(ACTION_NAME=='myrecommend'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myrecommend'); ?>">
        	<div id="n11" class="n <?php if(ACTION_NAME=='myrecommend'){echo 'm11';}else{echo 'n11';} ?>"></div>
            我的推荐
        </a>
        <a class="<?php if(ACTION_NAME=='myfollow'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myfollow'); ?>">
        	<div id="n7" class="n <?php if(ACTION_NAME=='myfollow'){echo 'm7';}else{echo 'n7';} ?>"></div>
            关注的人
        </a>
        <a class="<?php if(ACTION_NAME=='myfocus'){echo 'nn';}else{echo 'nav_wrapper';} ?>" href="<?php echo U('User/myfocus'); ?>">
        	<div id="n8" class="n <?php if(ACTION_NAME=='myfocus'){echo 'm8';}else{echo 'n8';} ?>"></div>
            关注的<?php echo ($sign); ?>
        </a>
    </div>
    <div class="u"></div>		
    <div id="main">
    	<div class="profile_block">
        	<div class="profile_name">基本资料</div>
            <div class="profile_wrapper">昵称：<?php echo ($user['name']); ?></div>
            <div class="profile_wrapper">邮箱：<?php echo ($user['email']); ?></div>
            <div class="profile_wrapper">我的邀请码(<?php echo ($user['invitecount']); ?>)：<?php echo ($user['invitecode']); ?></div>
            <div class="profile_wrapper" id="gender_div">
            	性别：<a class="<?php echo $user['gender']==0?'radio_checked':'radio'; ?>" name="0">男</a><a class="<?php echo $user['gender']==1?'radio_checked':'radio'; ?>" name="1">女</a><a class="<?php echo $user['gender']==2?'radio_checked':'radio'; ?>" name="2">女博士</a>
                <input type="hidden" class="profile_val" id="gender" value="<?php echo ($user['gender']); ?>" />
            </div>
            <div class="profile_wrapper">
            	现居：<select id="province" name="s_province"></select>
                    <select id="city" name="s_city" ></select>
                    <select id="hometown" name="s_county"></select>
            </div>
            <div class="profile_wrapper">
            	职业：<select name="job_id" id="job" class="select_job"><option value="0">-----</option><option value="1">站长</option><option value="2">产品经理</option><option value="3">视觉设计师</option><option value="4">程序员</option><option value="5">前端工程师</option><option value="6">风险投资者</option><option value="7">职业经理人</option><option value="8">运营人员</option><option value="9">人力资源</option><option value="10">运维人员</option><option value="11">创业者</option><option value="12">媒体</option><option value="13">天使</option><option value="14">学生</option><option value="15">技术员</option><option value="16">其他</option></select>
            </div>
            <div class="profile_wrapper">
            	<span>标签：</span><input type="text" id="tag_input" class="user_input" value="<?php echo ($user['tag']); ?>" />
            </div>
            <div class="profile_wrapper">
            	<span>大学：</span><input type="text" class="user_input" name="school" id="school-name"  onblur="if(this.value==''){this.value=''}" onfocus="if(this.value==''){this.value=''}" onclick="pop()" value="<?php echo ($user['university']); ?>" />
            </div>
            <div class="profile_wrapper">
            	<span>院系：</span><input type="text" id="college" class="user_input" value="<?php echo ($user['college']); ?>" />
            </div>
            <div class="profile_wrapper">
            	感情状态：<a class="<?php echo $user['lovestate']==0?'radio_checked':'radio'; ?>" name="0">单身贵族</a><a class="<?php echo $user['lovestate']==1?'radio_checked':'radio'; ?>" name="1">热恋中</a><a class="<?php echo $user['lovestate']==2?'radio_checked':'radio'; ?>" name="2">跪求女神</a><a class="<?php echo $user['lovestate']==3?'radio_checked':'radio'; ?>" name="3">跪求男神</a>
                <input type="hidden" class="profile_val" id="lovestate" value="<?php echo ($user['lovestate']); ?>" />
            </div>
        </div>
        <div class="profile_block">
            <div class="profile_name">关注我的人(<?php echo count($follow); ?>)</div>
                <?php if($follow=='')
                    	{
                        	echo '<div id="no_user_follow">暂无用户关注您</div>';
                        }else{
                        		foreach($follow as $k=>$v)
                                	{
                                    	echo '<div class="avatar_wrapper user_avatar">
                                                  <img src="__PUBLIC__'.get_avatar($v['myid'],'min').'" class="avatar" />
                                                  <img src="__PUBLIC__/css/avatar_cover.png" class="avatar_cover" /> 
                                                  <input type="hidden" value="'.$v['myid'].'" class="avatar_hidden" /> 
                                             </div>';
                                    }	
                        	 } ?>
            <div class="clear"></div>
         </div>
         <div class="profile_block">
            <div class="profile_name">联系方式</div>
            <div class="profile_wrapper left">
            	<span>QQ&nbsp;：</span><input type="text" class="user_input" id="qq" value="<?php echo ($user['qqnumber']); ?>" />
            </div>
            <div class="profile_wrapper left">
            	<span>电话：</span><input type="text" id="phone" class="user_input" value="<?php echo ($user['phone']); ?>" />
            </div>
            <div class="clear"></div><br /><br />
         </div>
         <div class="w"></div>
         <div class="rect_button save" id="save_user">保存</div>
    </div>
   
    <div id="choose-box-wrapper">
	<div id="choose-box">
		<div id="choose-box-title">
			<span>选择学校</span>
		</div>
		<div id="choose-a-province"></div>
		<div id="choose-a-school"></div>
		<div id="choose-box-bottom">
			<input type="button" onclick="hide()" value="关闭" />
		</div>
	</div>
</div>
<div class="clear"></div>    
<div id="letter_div">
    	<div id="letter_name">站内信</div>
        <div id="letter_close"></div>
        <input type="text" id="letter_input" />
        <textarea id="letter_textarea"></textarea>
        <div id="letter_sub">发 送</div>
    </div>
	<div id="roll">
    	<div title="回到顶部" id="roll_top"></div>
        	<?php echo $user['id']!=NULL?'<a id="ct" href="'.U('Question/publish').'" title="快速发布"></a>':''; ?>
            <div title="转到底部" id="fall"></div>
        </div>    
<div id="cover"></div>
<div id="tip">
	<div id="tip_left"></div>
    <div id="tip_mid"></div>
    <div id="tip_right"></div>
</div>

<div id="info_window">
    	<a id="info_left" href="" target="_blank">
        	<img class="info_avatar" />
            <div class="info_mask"></div>
        </a>
        <div id="info_mid">
        	
        </div>
        <div id="info_right">
        
        </div>
</div>
<div id="footer">
	<!--container of the ajax loading data, fobbiden deleting-->
	<div id="data"></div>
    <!--container of the ajax loading data, fobbiden deleting-->
    <input type="hidden" name="ha" id="ha" value="<?php echo ($ha); ?>" />
    <div id="copyright">Copyright &copy; 2012-2013 - QuoraCms社会化问答程序</div>
    <a href="http://www.miibeian.gov.cn/" id="icp_a" target="_blank"><?php echo ($setting["icp"]); ?></a>
</div>  
</body>
</html>