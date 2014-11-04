<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
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
		.intro{
			margin-bottom:10px;
		}
		.box{
			width:94%;
			margin:10px auto
		}
		.user{
			margin-bottom: 5px;
			font-size: 12px;
		}
		.input{
			height:35px;
			width:100%;
			margin-bottom: 10px;
		}
		.duihuan{
			background:#FF3709;
			width:100%;
			height:50px;
			line-height: 50px;
			text-align: center;
			color: white;
		}
		#mode{
			background-color:rgba(0, 0, 0,0.6); 
			width: 100%;
			height: 100%;
			position:fixed;
			z-index: 9;
			top:0;
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
			商品详情
		</p>
		<a href="/home/index"><p id="toempty" style="float:right;width:18%;height:20px;line-height:20px;margin-top:15px;margin-right:10px;text-align:center;color:white"><img src="/Public/static/img/zhuye.jpg"></p></a>
	</div>
	
	<div class="box">
		<img src="/Uploads/<?php echo ($goods_info["image"]); ?>" style="width:100%">
	</div>

	<div class="box">
		<div>
			<p class="intro">名&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;称：<?php echo ($goods_info["shop_name"]); ?></p>
			<p class="intro">市场价格：￥<?php echo ($goods_info["market_price"]); ?>.00</p>
			<p class="intro">需要积分：<?php echo ($goods_info["price"]); ?></p>
			<div class="intro">
				详&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;情：<?php echo ($goods_info["introduce"]); ?>
			</div>
		</div>
	</div>

	<div class="box">
		<p class="user">本人手机号码</p>
		<input class="input" type="text" id="mobile" name="mobile" value="" placeholder="请输入本人手机号码，以便客服确认">
		<p class="user">联系人姓名</p>
		<input class="input" type="text" id="name" name="name" value="" placeholder="请输入收货人的姓名">
		<p class="user">收货地址</p>
		<input class="input" type="text" id="address" name="address" value="" placeholder="虚拟商品请填写其他收货信息">
	</div>

	<div class="box">
		<p class="duihuan">兑换</p>
	</div>
	

	<div id="mode" style="display:none;text-align:center;">
		<div id="modebody">
			<p style="text-align:center;padding:20px">兑换<span id="goods_name"><?php echo ($goods_info["shop_name"]); ?></span>，您将失去<span id="goods_price"><?php echo ($goods_info["price"]); ?></span>积分，确定兑换码？</p>
			<p style="">
				<button id="yes">确定</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="no">取消</button>
			</p>
		</div>
	</div>

<script type="text/javascript">
	var score=<?php echo ($goods_info["price"]); ?>;   //定义消耗的积分
	var id=<?php echo ($goods_info["id"]); ?>;      //定义商品ID
	function isDigit(s)
	{
		var patrn=/^[0-9]{1,20}$/;
		if (!patrn.exec(s)) return false
		return true
	}
	$('.duihuan').click(function(){
		if($('#mobile').val()==''){
			alert('请填写您的手机号码');
			return false;
		}
		if(!isDigit($('#mobile').val())){
			alert('请填写正确的手机号码');
			return false;
		}
		if($('#name').val()==''){
			alert('请填写您的真实姓名');
			return false;
		}
		if($('#address').val()==''){
			alert('请填写您的地址或别的收货信息');
			return false;
		}
		$('#mode').show(); 
		$('body').css('overflow','hidden');
		var height=(document.body.clientHeight-150)/2;
		$('#modebody').css({'width':'80%','height':'150px','background':'white','margin':height+'px auto'});
	});
	$('#yes').click(function(){
		$.post('/home/ScoreShop/getGoods',{id:id,score:score,name:$('#name').val(),mobile:$('#mobile').val(),address:$('#address').val()},function(data){
			$('#mode').hide();
			$('body').css('overflow','auto');
			alert(data.msg);
			if(data.status==1){
				window.location.href="/home/ScoreShop"
			}
		},'json');
	});
	$('#no').click(function(){
		$('#mode').hide();
		$('body').css('overflow','auto');
	});
</script>
</body>
</html>