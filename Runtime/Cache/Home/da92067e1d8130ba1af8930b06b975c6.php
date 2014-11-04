<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>积分兑换-网评如潮</title>
	<style type="text/css">
		body{
			margin: 0;
			padding: 0;
			min-width: 320px;
			max-width: 768px;
			margin:0 auto;
			font-family: "微软雅黑","黑体";
		}
		*{
			margin: 0;
			padding: 0;
		}
		a{
			text-decoration: none;
			color:black;
		}
		.zhuanqu_title{
			height:25px;
			line-height: 25px;
			color:white;
			text-align: left;
			width:98%;
			margin: 0 auto;
			background: #FF3709;
		}
		.goods_list{
			width:33%;
			float:left;
		}
		.goods_img{
			display: block;
			width:92%;
			margin: 10px auto;
		}
		.duihuan{
			background: #C7060B;
			height:25px;
			line-height: 25px;
			width:90%;
			margin:0 auto;
			color: white;
			text-align: center;
		}
		#mode{
			background-color:rgba(0, 0, 0,0.6); 
			width: 100%;
			height: 100%;
			position:absolute;
			z-index: 9;
			top:0;
		}
		ul{
			list-style: none;
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
			兑换商城
		</p>
		<a href="/home/index"><p id="toempty" style="float:right;width:18%;height:20px;line-height:20px;margin-top:15px;margin-right:10px;text-align:center;color:white"><img src="/Public/static/img/zhuye.jpg"></p></a>
	</div>
	
	<div style="width:96%;margin:10px auto;border:solid 1px #A7A7A7">
		<div style="float:left;width:25%;max-width:70px;min-width:70px;height:70px;">
			<a href="/home/user"><img src="<?php if($userInfo[0]['image']){echo '/Uploads/Picture/User/'.$userInfo[0]['image'];}else{ echo '/Public/static/img/default_big.jpg'; } ?>" style="width:100%;height:100%"></a>
		</div>
		<div style="float:left;width:75%;height:70px;">
			<p style=" margin-left:15px;"><a href="/home/user"><?php echo ($userInfo["0"]["name"]); ?></a></p>
			<p style="margin-left:15px;color:#A7A7A7;font-size:12px;height:22px;line-height:22px;">当前积分：<?php echo ($userInfo["0"]["score"]); ?></p>
			<p style="margin-left:15px;"><a href="jifen" style="color:#0B2FC3;text-decoration:underline;">什么是积分?</a></p>
		</div>
		<div style="clear:both"></div>
	</div>
	
	<!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
	<div style="margin-bottom:15px;">
		<p class="zhuanqu_title">&nbsp;&nbsp;<?php echo ($list["zhuanqu_name"]); ?></p>
		<div style="width:96%;margin:0 auto">
			<ul>
				<!-- <?php if(is_array($list["arr"])): $i = 0; $__LIST__ = $list["arr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?>-->
				<a href="/home/ScoreShop/goods_info?id=<?php echo ($arr["gid"]); ?>"><li class="goods_list">
					<img src="/Uploads/<?php echo ($arr["thumb_img"]); ?>" class="goods_img">
					<p style="display:none"><?php echo ($arr["gid"]); ?></p>
					<p style="display:none"><?php echo ($arr["shop_name"]); ?></p>
					<p style="display:none"><?php echo ($arr["price"]); ?></p>
					<p class="duihuan">兑换</p>
				</li></a>
				<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
			</ul>
			<div style="clear:both"></div>
		</div>
	</div>
	<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->

	<div id="mode" style="display:none;text-align:center;">
		<div id="modebody">
			<p style="text-align:center;padding:20px">兑换<span id="goods_name"></span>，您将失去<span id="goods_price"></span>积分，确定兑换码？</p>
			<p style="">
				<button id="yes">确定</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="no">取消</button>
			</p>
		</div>
	</div>

<script type="text/javascript">
	
</script>
</body>
</html>