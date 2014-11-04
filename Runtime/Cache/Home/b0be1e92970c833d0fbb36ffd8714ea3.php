<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<title><?php echo empty($userInfo[0]['name'])?$userInfo[0]['account']:$userInfo[0]['name']; ?>的资料-网评如潮</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			min-width: 320px;
			max-width: 768px;
			margin:0 auto;
			font-family: "微软雅黑","黑体";
			background:#D2D2D2;
		}
		*{
			margin: 0;
			padding: 0;
		}
		a{
			text-decoration: none;
			color:black;
		}
		.intro{
			padding:10px 15px;
		}
	</style>
	<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
</head>
<body>
	<div style="background:#C7060B;width:100%;height:50px;line-height:50px;margin-bottom:15px;">
		<p style="width:15%;max-width:80px;text-align:left;float:left;height:50px;line-height:50px;padding:7px 0;">
			<a href="javascript:history.go(-1)"><img src="/Public/static/img/fanhui.jpg"></a>
		</p>
		<p style="width:63%;float:left;height:50px;line-height:50px;text-align:center;color:white">
			<?php echo empty($userInfo[0]['name'])?$userInfo[0]['account']:$userInfo[0]['name']; ?> 个人资料
		</p>
		<a href="/home/index"><p id="toempty" style="float:right;width:18%;height:20px;line-height:20px;margin-top:15px;margin-right:10px;text-align:center;color:white"><img src="/Public/static/img/zhuye.jpg"></p></a>
	</div>
	<div style="width:94%;margin:10px auto;border:solid 1px #9F9F9F;background-color:white">
		<div class="intro">
			<strong>基本信息</strong>
		</div>
		<div class="intro">
			昵称&nbsp;&nbsp;<?php echo ($userInfo["0"]["name"]); ?>
		</div>
		<div class="intro">
			性别&nbsp;&nbsp;<?php echo empty($userInfo[0]['sex'])?"女":"男"; ?>
		</div>
		<div class="intro">
			所在地&nbsp;&nbsp;<?php echo ($userInfo["0"]["province"]); echo ($userInfo["0"]["city"]); echo ($userInfo["0"]["district"]); ?>
		</div>
		<div class="intro">
			简介&nbsp;&nbsp;<?php echo ($userInfo["0"]["introduction"]); ?>
		</div>
	</div>

	<div style="width:94%;margin:10px auto;border:solid 1px #9F9F9F;background-color:white">
		<div class="intro">
			生日&nbsp;&nbsp;<?php echo (substr($userInfo["0"]["birthday"],0,10)); ?>
		</div>
		<div class="intro">
			QQ&nbsp;&nbsp;<?php echo ($userInfo["0"]["QQ"]); ?>
		</div>
	</div>
</body>
</html>