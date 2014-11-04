<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
	<title>网评潮流-登陆</title>
	<style type="text/css">
		*{
			padding:0;
			margin:0;
			text-decoration:none;
			list-style:none;
		}
		a{color:#000;}
		body{
			font-size: 16px;
			font-family: "Microsoft YaHei";
			max-width:768px;
			min-width:320px;
			margin:0 auto;
			position:relative;
			background: white;
		}
		.insert_input{
			position: absolute;
			border:0;
			height:38px;
			width:80%;
		}
	</style>
	</head>
	<body>
		<div style="height:60px;background:#C40507">
			<a href="/home/index"><img src="/Public/static/img/logo.jpg" style="margin:10px;"></a>
			<a href="/home/user/introduce"><img src="/Public/static/img/logo2.gif" style="display:block;float:right;margin:5px"></a>
			<div style="clear:both"></div>
			<!-- <img src="/Public/static/img/logo3.jpg" style="position:absolute;top:50px;left:120px;"> -->
		</div>
		<div style="width:100%;height:40px;margin:0 auto;background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);border-bottom:solid 1px #D5D4D4">
			<!-- <div style="width:12%;height:40px;float:left"> 
				<a href="javascript:history.go(-1)"><img src="/Public/static/img/you.jpg" style="line-height:40px;margin-top:14px;"></a>
			</div> -->
			<div style="background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);width:49%;height:40px;float:left;text-align:center;line-height:40px;">
				用户登陆
			</div>
			<a href="/home/user/insert"><div style="width:49%;height:40px;float:left;text-align:center;line-height:40px;background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);">
				用户注册<img src="/Public/static/img/head_jiao2.jpg" style="height:10px;display:block;top:91px;position:absolute;left:23%;float:left">
			</div></a>
			<div style="clear:both"></div>
		</div>

		<div style="color:#C70609;margin:15px;font-size:16px;letter-spacing:4px;text-align:center">
			<img src="/Public/static/img/logo4.jpg">
		</div>
			<!-- <p style="margin-left:15%">给<span style="font-size:20px;">奸商</span>一个<span style="font-size:20px;">差评</span></p>
			<p style="margin-left:31%">给自己一个<span style="font-size:20px;">机会</span></p> -->

		<div style="width:90%;border:solid 1px #D5D1D2;margin:15px auto;position:relative;box-shadow:1px 1px 1px #838383">
			<div style="height:40px">
				<img src="/Public/static/img/insert_user.gif" style="margin:12px 13px;">
				<input type="text" name="name" id="name" value="<?php if($name){echo $name;} ?>" class="insert_input" placeholder="请输入用户名(5-12位英文、数字组成)" style="top:1px">
			</div>
			<div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/lock.jpg" style="margin:10px 14px 18px 14px">
				<input type="password" name="password" id="password" value="" class="insert_input" placeholder="请输入密码" style="top:42px">
			</div>
		</div>
		
		<input type="checkbox" id="save" checked="" style="margin-left:10%">保存密码
		<a href="/home/user/findUser" style="display:block;float:right;margin-right:10%">忘记密码？</a>
		<div id="doact" style="width:90%;position:relative;margin:10px auto;text-align:center">
			<div style="width:100%;height:60px;line-height:60px;background:#C7060B;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">确认登陆</div>
			<!-- <div style="width:100%;height:30px;background:#C7060B;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div> -->
			<!-- <span  style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%;">确认登陆</span> -->
		</div>
		
		<a href="/home/user/insert">
			<div style="width:90%;position:relative;margin:10px auto;text-align:center">
				<!-- <div style="width:100%;height:30px;background:#F95D20;border-top-left-radius:5px;border-top-right-radius:5px;"></div>
				<div style="width:100%;height:30px;background:#F95D20;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div>
				<span style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%">快速注册</span> -->
				<div style="width:100%;height:60px;line-height:60px;background:#F95D20;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">马上注册</div>
			</div>
		</a>
		<!-- <span style="margin-left:20px;">使用其他账号登陆</span>&nbsp;&nbsp;<a href="/home/user/qqLogin"><img src="/Public/static/img/qq.jpg"></a>&nbsp;&nbsp;&nbsp;<a href="/home/user/weiboLogin"><img style="height:25px;" src="/Public/static/img/weibo.jpg"></a> -->
	</body>
	<script type="text/javascript">
	$(document).ready(function(){
		/*var save=1;
		$('#save').change(function(){
			if($('#save').attr("checked")){
				save=1;
			}else{
				save=0;
			}
			alert(save);
		});*/
		$('#doact').click(function(){
			var save;
			var name=$('#name').val();
			var password=$('#password').val();
			if($('#save').prop("checked")){
				save=1;
			}else{
				save=0;
			}
			if(name==''){
				alert("请填写用户名");
				return false;
			}
			if(password==''){
				alert('请输入密码');
			}
			$.post('/home/user/checkLogin',{'name':name,'password':password,'save':save},function(data){
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
	});
	</script>
</html>