<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>网评如潮</title>
<link rel="stylesheet" type="text/css" href="/Public/static/css/web_style.css">
<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
<script type="text/javascript" src="/Public/static/js/web_common.js"></script>
<script type="text/javascript" src="/Public/static/js/pccs.js"></script>
</head>
<body>
	
		<div class="base_left">
			<div class="base_left_top">
				<?php if($isLogin){ ?>
					<div style="width:98%;height:200px;margin:30px auto;margin-bottom:10px;border:solid 1px #C7C6C7;box-shadow:1px 1px 1px #C7C6C7">
						<div style="">
							<img src="<?php if(!empty($conmon_user[0]['image'])){ echo '/Uploads/Picture/User/'.$conmon_user[0]['image']; }else{ echo '/Public/static/img/default_big.jpg'; } ?>" style="width:140px;height:140px;margin:10px;display:block">
						</div>
						<div>
							<ul>
								<a href="/home/user/userIntro"><li class="base_user">
									发布<br>
									<?php echo ($fabu_num); ?>
								</li></a>
								<a href="/home/user/follow?type=1"><li class="base_user">
									关注<br>
									<?php echo ($conmon_user["0"]["follow_count"]); ?>
								</li></a>
								<a href="/home/user/follow"><li class="base_user">
									粉丝<br>
									<?php echo ($conmon_user["0"]["fans_count"]); ?>
								</li></a>
							</ul>
						</div>
					</div>
					<p style="text-align:center">
						<?php echo ($conmon_user["0"]["account"]); ?>
					</p>
				<?php }else{ ?>
					<div style="width:100%;height:100%;position:relative">
						<p style="position:absolute;top:100px;left:10px;color:white;text-align:center">
							<a href="javascript:base_login();">登陆</a>
						</p>
						<p style="position:absolute;top:140px;left:10px;color:white;text-align:center">
							<a href="/home/user/insert">注册</a>
						</p>
					</div>
				<?php } ?>
			</div>
			<div class="base_left_bottom">
				<a href="/home">
					<?php if($act == 'index'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_home.jpg" class="img_middle">
						首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页
					</p>
				</a>
				<a href="/home/act/addreview">
					<?php if($act == 'act'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_fabu.jpg" class="img_middle">
						发&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;布
					</p>
				</a>
				<a href="/home/index/searchIndex">
					<?php if($act == 'search'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_search.jpg" class="img_middle">
						搜索差评
					</p>
				</a>
				<a href="/home/user">
					<?php if($act == 'user'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_user.jpg" class="img_middle">
						个人中心
					</p>
				</a>
				<a href="/home/user/messageBox">
					<?php if($act == 'message'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_message.jpg" class="img_middle">
						消息中心
					</p>
				</a>
			</div>
		</div>
	
	
	<div class="base_right mtop30">
		<div class="fabu_index_left" style="margin:10px;border:solid 1px #DBDBDB">
			<div id="masseage_top" align="center">
				<?php echo ($uInfo["0"]["name"]); ?>
			</div>
			<div id="masseage_bottom">
				<textarea id="content" style="width:96%;margin:0 auto;border:solid 1px #D2D2D2;height:60px;display:block"></textarea> 
				<p style="width:96%;margin:0 auto;text-align:right;color:#999999">140字</p>
				<button id="toempty" style="display:block;height:30px;color:white;font-size:18px;background:#FFAA24;width:90px;border:0;float:left;margin-left:2%">清空</button>
				<button id="send" style="display:block;height:30px;color:white;font-size:18px;background:#18ABF6;width:90px;border:0;float:right;margin-right:2%">发送</button>
				<div style="clear:both"></div>
				<!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
					<div style="margin:0 10px;">	
						<?php if($list['add'] == 1): ?><div style="margin-bottom:20px;color:#999999">
							<div style="float:left;text-align:left;width:33%"><del>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</del></div>
							<div style="float:left;text-align:center;width:33%"><?php echo (date("Y-m-d",$list["time"])); ?></div>
							<div style="float:left;text-align:right;width:33%"><del>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</del></div>
							<div style="clear:both"></div>
						</div><?php endif; ?>
						<p style="color:#A4A2A3;font-size:12px;text-align:center;margin:10px 0"><?php echo (date("h:i:s",$list["time"])); ?></p>
						<img src="/<?php if($list['type']=='send'){echo empty($myInfo[0]['image'])?'Public/static/img/default_big.jpg':'Uploads/Picture/User/'.$myInfo[0]['image'];}else{echo empty($uInfo[0]['image'])?'Public/static/img/default_big.jpg':'Uploads/Picture/User/'.$uInfo[0]['image'];} ?>" style="float:<?php echo $list['type']=='send'?'right':'left'; ?>;width:18%;min-width:40px;max-width:40px;height:40px;">
						<?php if($list['type'] == 'save'): ?><div style="border:solid 1px white;float:left;width:82%;position:relative;padding-top:10px;">
								<div style="position:absolute;width:0;height:0;border:solid 15px #D5D5D5;border-color:transparent #D5D5D5 transparent transparent;top:15px;left:-3px;"></div>
								<div style="margin:5px 0 20px 20px;">
									<span style="display:inline-block;text-align:left;background:#D5D5D5;padding:10px;border-radius:5px;"><?php echo ($list["content"]); ?></span>
								</div>
							</div>
						<?php else: ?>
							<div style="border:solid 1px white;float:right;width:82%;position:relative;padding-top:10px;">
								<div style="position:absolute;width:0;height:0;border:solid 15px #D5D5D5;border-color:transparent transparent transparent #D5D5D5;top:15px;right:-3px;"></div>
								<div style="text-align:right;margin:5px 20px 20px; 0;">
									<span style="display:inline-block;text-align:left;background:#D5D5D5;padding:10px;border-radius:5px;"><?php echo ($list["content"]); ?></span>
								</div>
							</div><?php endif; ?>
						<div style="clear:both"></div>
					</div>
				<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
			</div>
		</div>
		<div class="fabu_index_right">
			<img src="/Public/static/img/web_logo_big.jpg" style="width:215px" class="mtop15">
		</div>
	</div>
	<script type="text/javascript">
		$('#send').click(function(){
			var content=$('#content').val();
			if(content==''){
				alert('内容不能为空');
				return false;
			}
			$.post('/home/user/sendMessage',{sendId:"<?php echo $myInfo[0]['uid'] ?>",saveId:"<?php echo $uInfo[0]['uid'] ?>",content:content},function(data){
				if(data.status==1){
					alert("发送成功！");
					window.location.href=window.location.href;
				}else{
					alert("发送失败！");
				}
			},'json')
		});

		$('#toempty').click(function(){
			var content=$('#content').val();
			$.post('/home/user/toEmpty',{sendId:"<?php echo $myInfo[0]['uid']; ?>",saveId:"<?php echo $uInfo[0]['uid'] ?>"},function(data){
				if(data.status==1){
					alert("操作成功！");
					window.location.href='/home/user/messageBox';
				}else{
					alert("操作失败！");
				}
			},'json')
		});
	</script>

	<div id="base_login_mode" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,0.5)">
		<div id="base_login_main" style="width:400px;height:400px;border:solid 1px #D5D1D2;position:relative;background:white">
			<p style="height:40px;background:#F0ECEB;color:#CC4F53;line-height:40px;font-size:18px;">
				<img src="/Public/static/img/logo_small.jpg" style="vertical-align: middle;">
				登陆网评如潮
				<img src="/Public/static/img/base_xx.jpg" style="display:block;float:right;margin:15px;" id="base_login_close">
			</p>
				<div style="height:40px;width:300px;margin:0 auto;margin-top:50px;border:solid 1px #D5D1D2;">
					<img src="/Public/static/img/insert_user.gif" style="margin:12px 13px;">
					<input type="text" name="login_name" id="login_name" value="<?php if($name){echo $name;} ?>"  placeholder="请输入用户名(5-12位英文、数字组成)" style="top:91px;height:38px;border:0;position:absolute;width:257px;">
				</div>
				<div style="height:40px;border:solid 1px #D5D1D2;border-top:0;width:300px;margin:0 auto">
					<img src="/Public/static/img/lock.jpg" style="margin:10px 14px 18px 14px">
					<input type="password" name="login_password" id="login_password" value="" placeholder="请输入密码" style="top:132px;height:38px;border:0;position:absolute;width:257px;">
				</div>
				<p style="width:300px;margin:10px auto">
					<input type="checkbox" id="save" checked="" style="">保存密码
					<a href="/home/user/findUser" style="display:block;float:right;">忘记密码？</a>
				</p>
				<div id="login_doact" style="width:300px;height:60px;line-height:60px;margin:20px auto;background:#C7060B;text-align:center;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">确认登陆</div>
				<!-- <p style="width:300px;margin:0 auto">可以使用以下方式登陆</p> -->
		</div>
	</div>
	<div id="base_insert_mode">
		
	</div>
<script type="text/javascript">
	document.getElementById('base_login_main').style.top=(document.body.clientHeight-400)/2+'px';
	document.getElementById('base_login_main').style.left=(document.body.clientWidth-400)/2+'px';
	$('#base_login_close').click(function(){
		$('#base_login_mode').hide();
	});
	// alert(document.body.clientHeight);
	function base_login(){
		$('#base_login_mode').show();
	}
	function base_insert(){

	}

	$('#login_doact').click(function(){
		var save;
		var login_name=$('#login_name').val();
		var login_password=$('#login_password').val();
		if($('#save').prop("checked")){
			save=1;
		}else{
			save=0;
		}
		if(login_name==''){
			alert("请填写用户名");
			return false;
		}
		if(login_password==''){
			alert('请输入密码');
		}
		$.post('/home/user/checkLogin',{'name':login_name,'password':login_password,'save':save},function(data){
			if(data.status==1){
				alert(data.msg);
				window.location.href="/home/user/index";
			}else{
				alert(data.msg);
			}
		},
		'json'
		);
	});
</script>
</body>
</html>