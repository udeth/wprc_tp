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
		<div style="height:55px;background:#C40507">
			<a href="/home/index"><img src="/Public/static/img/logo.jpg" style="margin:10px;"></a>
			<a href="/home/user/introduce"><img src="/Public/static/img/logo2.gif" style="display:block;float:right;margin:5px"></a>
			<div style="clear:both"></div>
			<!-- <img src="/Public/static/img/logo3.jpg" style="position:absolute;top:50px;left:120px;"> -->
		</div>
		<div style="width:94%;margin:0 auto;">
			<div style="width:12%;height:40px;float:left"> 
				<a href="javascript:history.go(-1)"><img src="/Public/static/img/you.jpg" style="line-height:40px;margin-top:14px;"></a>
			</div>
			<!-- <a href="/home/user/login"><div style="width:42%;height:40px;float:left;color:#FA794F;text-align:center;line-height:40px;">
				用户登陆
			</div></a>
			<div style="width:42%;height:40px;float:left;text-align:center;line-height:40px;border-bottom:solid 2px #C70609">
				用户注册
			</div> -->
			<div style="clear:both"></div>
		</div>

		<div style="color:#C70609;margin:15px;font-size:16px;letter-spacing:4px;text-align:center">
			<img src="/Public/static/img/logo4.jpg">
		</div>
		<p style="font-size:20px;margin-left:5%">密码找回</p>
		<div style="width:90%;border:solid 1px #D5D1D2;margin:15px auto;position:relative">
			<div style="height:40px">
				<img src="/Public/static/img/insert_user.gif" style="margin:12px 15;">
				<input type="text" name="name" id="name" value="" class="insert_input" placeholder="请输入用户名" style="top:1px">
			</div>
			<div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/email.jpg" style="margin:14px;">
				<input type="text" name="email" id="email" value="" class="insert_input" placeholder="请输入邮箱" style="top:42px">
			</div>
		</div>
		<div id="doact" style="width:90%;position:relative;margin:10px auto;text-align:center">
			<div style="width:100%;height:30px;background:#C7060B;border-top-left-radius:5px;border-top-right-radius:5px;"></div>
			<div style="width:100%;height:30px;background:#C7060B;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div>
			<span  style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%">邮件找回</span>
		</div>
		
		<a href="/home/user/login">
			<div style="width:90%;position:relative;margin:10px auto;text-align:center">
				<div style="width:100%;height:30px;background:#F95D20;border-top-left-radius:5px;border-top-right-radius:5px;"></div>
				<div style="width:100%;height:30px;background:#F95D20;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div>
				<span style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%">返回登陆</span>
			</div>
		</a>
		<!-- <span style="margin-left:20px;">使用其他账号登陆</span>&nbsp;&nbsp;<a href="/home/user/qqLogin"><img src="/Public/static/img/qq.jpg"></a>&nbsp;&nbsp;&nbsp;<a href="/home/user/weiboLogin"><img style="height:25px;" src="/Public/static/img/weibo.jpg"></a> -->
	</body>
	<script type="text/javascript">
		$('#doact').click(function(){
			var name=$('#name').val();
			var email=$('#email').val();
			if(email==''){
				alert("请填写邮箱");
				return false;
			}
			if(name==''){
				alert("请填写用户名");
				return false;
			}
			$.post('/home/user/findUser',{'name':name,'email':email},function(data){
				if(data.status==1){
					alert(data.msg);
					window.location.href="/home/index";
				}else{
					alert(data.msg);
				}
			},
			'json'
			);
		});
	</script>
</html>