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
			width:1004px;
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
			&nbsp;&nbsp;&nbsp;用户注册
		</div>
		<div style="margin-top:40px;">
			<table style="width:600px;margin:0 auto">
				<tr>
					<td style="text-align:right">用户名&nbsp;&nbsp;&nbsp;</td>
					<td>
						<input type="text" name="name" id="name" value="<?php if($name){echo $name;} ?>" class="input" placeholder="请输入用户名(5-12位英文、数字组成)" style="top:1px">
					</td>
				</tr>
				<!-- <tr>
					<td style="text-align:right">手机号码&nbsp;&nbsp;&nbsp;</td>
					<td>
						<input type="text" id="mobile" name="mobile" class="input" placeholder="请输入手机号码">
					</td>
				</tr> -->
				<tr>
					<td style="text-align:right">
						密码&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<input type="text" name="password" id="password" value="" class="input" placeholder="请填写6-12位密码" style="top:83px;height:36px;">
					</td>
				</tr>
				<!-- <tr>
					<td style="text-align:right">
						确认密码&nbsp;&nbsp;&nbsp;
					</td>
					<td>
						<input type="password" id="repassword" name="repassword" class="input" placeholder="请再次输入密码"> 
					</td>
				</tr> -->
				<!-- <tr>
					<td style="text-align:right">注册邮箱&nbsp;&nbsp;&nbsp;</td>
					<td>
						<input type="text" id="email" name="email" class="input" placeholder="请输入邮箱">
					</td>
				</tr> -->
				<tr>
					<td style="text-align:right">邀请人用户名&nbsp;&nbsp;&nbsp;</td>
					<td>
						<input type="text" value="" id="pname" name="pname" class="input" placeholder="(5-12位英文、数字组成)">
					</td>
				</tr>
			</table>
		</div>
		<button id="doact" style="display:block;width:200px;border:0;background:#CA3F44;color:white;height:50px;line-height:50px;font-size:18px;margin:30px auto">
				确认注册
		</button>
	</body>
	<script type="text/javascript">
		$('#doact').click(function(){
			var name=$('#name').val();
			var password=$('#password').val();
			var repassword=$('#repassword').val();
			var email=$('#email').val();
			var mobile=$('#mobile').val();
			var pname=$('#pname').val();

			function submitCheck(){
				if(name==''){
					alert("请填写用户名");
					return false;
				}
				if(!isSsnString(name)){
					alert("用户名非法");
					return false;
				}
				if(name.length>12 || name.length<6){
					alert("请填写5-12位用户名");
					return false;
				}
				// if(email==''){
				// 	alert('请填写手机号码');
				// 	return false;
				// }
				// if(!CheckMail(email)){
				// 	alert("请填写正确的邮箱");
				// 	return false;
				// }
				// if(mobile==''){
				// 	alert("请填写手机号码");
				// 	return false;
				// }
				// if(!CheckMobile(mobile)){
				// 	return false;
				// }

				// if(password==''||repassword==''){
				// 	alert('请输入密码');
				// 	return false;
				// }
				return true;
			}
			
			function CheckMail(mail) {
				var filter  = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
				if (filter.test(mail)) return true;
				else {
					return false;
				}
			}

			function CheckMobile(mobile){
				var myreg = /^(((13[0-9]{1})|159|153)+\d{8})$/;
		        if(!myreg.test(mobile))
		        {
		            alert('请输入有效的手机号码！');
		            // document.getElementById("email").focus();
		            return false;
		        }
		        return true;
		    }

			function isSsnString (name){
				var re=/^[0-9a-z][\w-.]*[0-9a-z]$/i;
				if(re.test(name)){return true;}else{return false;}
			}
			

			// if(!CheckMail(email)){
			// 	alert("邮箱格式不正确");
			// 	return false;
			// }

			if(submitCheck()){

			
				$.post('/home/user/insert',{'name':name,'password':password,'pname':pname},function(data){
					if(data.status==1){
						alert(data.msg);
						window.location.href="/home/user/index";
					}else{
						alert(data.msg);
					}
				},
				'json'
				);
			}
		});
	</script>
</html>