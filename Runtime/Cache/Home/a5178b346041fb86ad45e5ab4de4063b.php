<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
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
			width:1004px;
			font-family: "Microsoft YaHei";
			margin:0 auto;
			position:relative;
			background: white;
		}
		.input{
			height:35px;
			width:400px;
		}
		tr{
			height:50px;
		}
	</style>
	</head>
	<body>
		<div style="height:100px;width:100%;">
			<a href="/home"><img src="/Public/static/img/web_logo_small.jpg"></a>
		</div>
		<div style="height:40px;line-height:40px;background:#CA3F44;width:100%;color:white">
			&nbsp;&nbsp;&nbsp;用户登陆
		</div>
		<div style="margin-top:40px;">
			<table style="width:600px;margin:0 auto">
				<tr>
					<td style="text-align:right">用户名&nbsp;&nbsp;&nbsp;</td>
					<td>
						<input type="text" id="name" name="name" class="input" placeholder="(5-12位英文、数字组成)">
					</td>
				</tr>
				<tr>
					<td style="text-align:right">
						密码&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<input type="password" id="password" name="password" class="input" placeholder="请输入密码"> 
					</td>
				</tr>
			</table>
		</div>
		<div style="margin-top:20px;">
			<input type="checkbox" id="save" checked="" style="margin-left:250px">保存密码
			<a href="/home/user/findUser" style="display:block;float:right;margin-right:350px">忘记密码？</a>
		</div>
		<div style="width:100%;margin-top:30px;">
			<button id="doact" style="display:block;width:200px;border:0;background:#CA3F44;color:white;height:50px;line-height:50px;font-size:18px;float:left;margin-left:200px;">
				登&nbsp;&nbsp;&nbsp;&nbsp;陆
			</button>
			<a href="/home/user/insert"><button style="display:block;width:200px;border:0;background:#CA3F44;color:white;height:50px;line-height:50px;font-size:18px;float:left;margin-left:200px;">
				注&nbsp;&nbsp;&nbsp;&nbsp;册
			</button></a>
			<div style="clear:both"></div>
		</div>
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