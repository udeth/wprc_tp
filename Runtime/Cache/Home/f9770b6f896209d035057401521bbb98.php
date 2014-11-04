<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
	<title>网评潮流-注册</title>
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
			<a href="/home/user/login"><div style="width:49%;height:40px;background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);float:left;text-align:center;line-height:40px;">
				用户登陆
			</div></a>
			<div style="width:49%;height:40px;background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);float:left;text-align:center;line-height:40px;">
				用户注册<img src="/Public/static/img/head_jiao2.jpg" style="height:10px;display:block;top:91px;position:absolute;left:70%;float:left">
			</div>
			<div style="clear:both"></div>
		</div>

		<div style="color:#C70609;margin:15px;font-size:16px;letter-spacing:4px;text-align:center">
			<img src="/Public/static/img/logo4.jpg">
		</div>

		<div style="width:90%;border:solid 1px #D5D1D2;margin:15px auto;position:relative;box-shadow:1px 1px 1px #838383">
			<div style="height:40px">
				<img src="/Public/static/img/insert_user.gif" style="margin:12px 15px;">
				<input type="text" name="name" id="name" value="<?php if($name){echo $name;} ?>" class="insert_input" placeholder="请输入用户名(5-12位英文、数字组成)" style="top:1px">
			</div>
			<!-- <div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/insert_mobile.jpg" style="margin:5px 14px;height:30px;">
				<input type="text" name="mobile" id="mobile" value="" class="insert_input" placeholder="请输入手机号码" style="top:41px">
			</div> -->
			<div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/lock.jpg" style="margin:10px 17px 18px 15px">
				<input type="password" name="password" id="password" value="" class="insert_input" placeholder="请输入密码" style="top:42px;height:36px;">
			</div>
			<!-- <div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/lock.jpg" style="margin:10px 18px 18px 14px">
				<input type="password" name="repassword" id="repassword" value="" class="insert_input" placeholder="请再次输入密码" style="top:123px;height:36px;">
			</div> -->
			<!-- <div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/email.jpg" style="margin:12px 15px;">
				<input type="text" name="email" id="email" value="" class="insert_input" placeholder="请输入您的邮箱（方便找回密码）" style="top:164px">
			</div> -->
			<div style="height:40px;border-top:solid 1px #D5D1D2">
				<img src="/Public/static/img/insert_user.gif" style="margin:12px 15px">
				<input type="text" name="pname" id="pname" value="" class="insert_input" placeholder="推荐人用户名(可不填)" style="top:83px;height:36px;">
			</div>
		</div>
		<div id="doact" style="width:90%;position:relative;margin:10px auto;text-align:center">
			<!-- <div style="width:100%;height:30px;background:#C7060B;border-top-left-radius:5px;border-top-right-radius:5px;"></div>
			<div style="width:100%;height:30px;background:#C7060B;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div>
			<span  style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%">注册并登陆</span> -->
			<div style="width:100%;height:60px;line-height:60px;background:#C7060B;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">注册并登陆</div>
		</div>
		
		<a href="/home/user/login">
			<div style="width:90%;position:relative;margin:10px auto;text-align:center">
				<!-- <div style="width:100%;height:30px;background:#F95D20;border-top-left-radius:5px;border-top-right-radius:5px;"></div>
				<div style="width:100%;height:30px;background:#F95D20;border-bottom-left-radius:5px;border-bottom-right-radius:5px;"></div>
				<span style="position:absolute;font-size:30px;color:white;top:11px;display:block;width:100%">返回登陆</span> -->
				<div style="width:100%;height:60px;line-height:60px;background:#F95D20;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">返回登陆</div>
			</div>
		</a>
		<!-- <span style="margin-left:20px;">使用其他账号登陆</span>&nbsp;&nbsp;<a href="/home/user/qqLogin"><img src="/Public/static/img/qq.jpg"></a>&nbsp;&nbsp;&nbsp;<a href="/home/user/weiboLogin"><img style="height:25px;" src="/Public/static/img/weibo.jpg"></a> -->
	</body>
	<script type="text/javascript">
		$('#doact').click(function(){
			var name=$('#name').val();
			var password=$('#password').val();
			// var repassword=$('#repassword').val();
			// var email=$('#email').val();
			// var mobile=$('#mobile').val();
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
				// if(email==''){
				// 	alert('请填写邮箱');
				// 	return false;
				// }
				// if(!CheckMail(email)){
				// 	alert("请填写正确的邮箱");
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
				var myreg = /^(((13[0-9]{1})|159|153|150|151|180|181|182|183|185|186|187|188|189)+\d{8})$/;
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