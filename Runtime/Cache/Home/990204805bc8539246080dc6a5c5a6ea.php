<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<meta property="qc:admins" content="2444477705670233656375" />
	<meta property="wb:webmaster" content="2d8e0eed9e013ea1" />
	<script type="text/javascript" src="/Public/static/js/pccs.js"></script>
	<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
	<script type="text/javascript" src="/Public/static/js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="/Public/static/js/js.js"></script>
	<title>网评如潮</title>
	<link href="/Public/static/css/style.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.searched{
			/*border-bottom:solid 2px #C70609;*/
			/*color:#FA794F;*/
		}
	</style>
	</head>
	<body>
		<div style="height:55px;width:100%;min-width:320px;max-width:768px;background:#C40507;position:fixed;top:0;z-index:9999">
			<a href="/home/index"><img src="/Public/static/img/logo.jpg" style="margin:10px;"></a>
			<a href="/home/user/introduce"><img src="/Public/static/img/logo2.gif" style="display:block;float:right;margin:5px"></a>
			<div style="clear:both"></div>
			<!-- <img src="/Public/static/img/logo3.jpg" style="position:absolute;top:50px;left:120px;"> -->
		</div>
		<div style="width:100%;margin:0 auto;min-width:320px;max-width:768px;border-bottom:solid 1px #DEDEDE;position:fixed;top:55px;background: -webkit-gradient(linear, left top, left bottom, from(#fefefe), to(#efefef));background: -moz-linear-gradient(top, #fefefe,#efefef);z-index:9999;font-size:14px;">
			<a href="/home/index"><div style="width:22%;height:40px;float:left;text-align:center;line-height:40px;">
				<img src="/Public/static/img/head_home.jpg" class="head_small_img">
				首页
				<?php if($act=='index'){ ?><img src="/Public/static/img/head_jiao.jpg" style="height:10px;display:block;top:31px;position:absolute;left:9%;float:left"><?php } ?>
			</div></a>
			<a href="/home/act/addreview"><div style="width:22%;height:40px;float:left;text-align:center;line-height:40px;">
				<img src="/Public/static/img/head_fabu.jpg" class="head_small_img">
				发布
				<?php if($act=='act'){ ?><img src="/Public/static/img/head_jiao.jpg" style="height:10px;display:block;top:31px;position:absolute;left:30%;float:left"><?php } ?>
			</div></a>
			<a href="/home/index/searchIndex"><div style="width:22%;height:40px;float:left;text-align:center;line-height:40px;">
				<img src="/Public/static/img/head_search.jpg" class="head_small_img">
				搜索
				<?php if($act=='search'){ ?><img src="/Public/static/img/head_jiao.jpg" style="height:10px;display:block;top:31px;position:absolute;left:55%;float:left"><?php } ?>
			</div></a>
			<a href="/home/user/index"><div style="width:28%;height:40px;float:left;text-align:center;line-height:40px;">
				<img src="/Public/static/img/head_user.jpg" class="head_small_img">
				个人中心
				<?php if($act=='user'){ ?><img src="/Public/static/img/head_jiao.jpg" style="height:10px;display:block;top:31px;position:absolute;left:80%;float:left"><?php } ?>
			</div></a>
			<div style="clear:both"></div>
		</div>
		<div style="margin-top:100px;"></div>
		<script type="text/javascript">

		</script>
		<!-- <div>
			<a class="head_toreview" href="/home/act/addreview"><strong>发布差评</strong></a>
		</div>
		<div class="head_search">
		<form method="post" action="/home/index/search">
			<select class="head_search_select" name="store_type">
				<option value="0">差网址</option>
				<option value="1">差实店</option>
			</select>
			<div class="head_search_change">
				<input name="kword" placeholder="请输入网址或店名" style="border:0;width:100%;height:30px">
			</div>
			<input type="submit" class="head_search_search" value="搜索">
		</form>
		</div> -->

<div style="border:solid 1px black;box-shadow:1px 1px 1px #838383;border-radius:3px;width:96%;margin:10px auto;margin-top:10px;">
	<div style="height:40px;width:94%;margin:10px auto;margin-top:30px;">
		<input placeholder="请输入产品名/网址/实体店名" type="text" id="content" style="height:40px;vertical-align: middle;width:80%;font-size:18px;">
		<img id="search" src="/Public/static/img/search.jpg" style="vertical-align: middle;height:40px;">
	</div>
	<div style="text-align:left;margin-left:3%">
		<input type="checkbox" style="" id="wangzhi" value="wangzhi">&nbsp;&nbsp;搜网址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<input type="checkbox" id="shiti" value="shiti">&nbsp;&nbsp;搜实体店
	</div>
	<div style="width:96%;margin:10 auto">
		<div id="area" style="overflow:hidden">
			<span style="display:block;float:left;font-size:16px;">地区:</span>
			<!-- <div class="t1" style="float:left;margin-left:10px;margin-bottom:0">
	            <select name="province" id="province">
	            </select>
	            <select name="city" id="city">
	            </select>
                <select name="county" id="county">
                </select>
	        </div> -->
	        <div>
	        <select id="s_province" name="s_province"></select>&nbsp;&nbsp;
	        <select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
	        <select id="s_county" name="s_county"></select>
	        
	        <script type="text/javascript">_init_area();</script>
	        </div>
	        <div id="show"></div>
	    </div>
       	</div>
	</div>
</div>

<script type="text/javascript">
	// setup();
	var Gid  = document.getElementById ;
	
	// Gid('s_county').setAttribute('onchange','showArea()');
	var url="/home/index/search?"
	//执行搜索操作
	$('#search').click(function(){
		if($('#shiti').prop("checked")){
			url+="shiti=1&";
		}
		if($('#wangzhi').prop("checked")){
			url+="wangzhi=1&";
		}
		if($('#s_province').val()!="省份"){
			url+="province="+$('#s_province').val()+"&";
		}
		if($('#s_city').val()!="地级市"){
			url+="city="+$('#s_city').val()+"&";
		}
		if($('#s_county').val()!="市、县级市"){
			url+="county="+$('#s_county').val()+"&";
		}
		url+="kword="+$('#content').val()+'&';
		// alert(url);
		window.location.href=url;
	});

</script>

<script type="text/javascript">
	
</script>

<?php if($_SESSION['loginInfo']||$_COOKIE['think_loginInfo']){}else{ ?>
<!-- <div id="public_close" style="position:fixed;background:rgba(200, 200, 200,0.7);height:25px;z-index:999;bottom:60px;width:50px;text-align:center;right:0">
关闭
</div>
<div id="public_foot" style="position:fixed;background:rgba(255, 0, 0,0.5);height:60px;z-index:999;bottom:0;width:100%;min-width:320px;max-width:768px;">
	<p style="float:left;color:white;margin-left:5%">给<span style="font-size:20px;">奸商</span>一个<span style="font-size:20px;">差评</span></p>
	<div style="clear:both"></div>
	<p style="float:left;color:white;margin-left:15%">给自己一个<span style="font-size:20px;">机会</span></p>
	<p style="margin-right:20px;margin-top:-10px;z-index:1000;text-align:right">
		<a href="/home/user/login"><span style="background:red;border-radius:3px;padding:5px 10px">登陆</span></a>
		<a href="/home/user/insert"><span style="background:orange;border-radius:3px;padding:5px 10px">注册</span></a>
	</p>
</div> -->
<?php } ?>
<script type="text/javascript">
// window.onscroll = function (){
// 	var marginBot = 0;
// 	if (document.documentElement.scrollTop){
// 		marginBot = document.documentElement.scrollHeight - (document.documentElement.scrollTop+document.body.scrollTop)-document.documentElement.clientHeight;
// 	} else {
// 		marginBot = document.body.scrollHeight - document.body.scrollTop- document.body.clientHeight;
// 	}
// 	if(marginBot<=0) {
// 		$('#public_foot').hide();
// 	}else{
// 		$('#public_foot').show();
// 	}
// }

// $('#public_close').click(function(){
// 	$('#public_close').hide();
// 	$('#public_foot').hide();
// })


</script>
</body>
</html>