<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	
<title>网评如潮-积分兑换</title>
<style type="text/css">
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
			left:0;
		}
	</style>

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
		<div id="masseage_top">
			积分兑换
		</div>
		<div class="box">
			<img src="/Uploads/<?php echo ($goods_info["image"]); ?>" style="width:60%;display:block;margin:0 auto">
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
			<p class="duihuan" style="width:30%">兑换</p>
		</div>
		

		<div id="mode" style="display:none;text-align:center;">
			<div id="modebody">
				<p style="text-align:center;padding:20px">兑换<span id="goods_name"><?php echo ($goods_info["shop_name"]); ?></span>，您将失去<span id="goods_price"><?php echo ($goods_info["price"]); ?></span>积分，确定兑换码？</p>
				<p style="">
					<button id="yes">确定</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="no">取消</button>
				</p>
			</div>
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
		var height=(document.body.clientHeight-150)/2;
		$('#modebody').css({'width':'250px','height':'150px','background':'white','margin':height+'px auto'});
	});
	$('#yes').click(function(){
		$.post('/home/ScoreShop/getGoods',{id:id,score:score,name:$('#name').val(),mobile:$('#mobile').val(),address:$('#address').val()},function(data){
			$('#mode').hide();
			alert(data.msg);
			if(data.status==1){
				window.location.href="/home/ScoreShop"
			}
		},'json');
	});
	$('#no').click(function(){
		$('#mode').hide();
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
					<a href="/home/scoreshop/findUser" style="display:block;float:right;">忘记密码？</a>
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
				window.location.href="/home/scoreshop/index";
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