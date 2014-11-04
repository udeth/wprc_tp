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

<div class="search_head">
	<strong>"<?php echo ($kword); ?>"的搜索结果</strong>
	<!-- <img src="/Public/static/img/xiala.jpg" style="display:block;float:right;margin:5px 5px 5px 10px"><span style="display:block;float:right;">精确查看</span> -->
</div>
<!-- <form method="post" action="/home/index/research">
<input type="hidden" name="kword" value="<?php echo ($kword); ?>">
<input type="hidden" name="store_type" value="<?php echo ($store_type); ?>">
<div id="search_input" style="display:none;">

	<div style="margin:10px;">
		<input type="text" name="product" placeholder="请输入产品名称" style="height:30px;line-heiht:30px;width:70%">
		<input type="submit" value="筛选" class="head_search_search">
	</div>
	<?php if($store_type==1){ ?>
	<div style="margin-left:10px;">
	<p style="font-size:14px;">地域筛选(实体店购买可选)</p>
	<span style="display:block;float:left;font-size:16px;">地域:</span>
				<div class="t1" style="float:left;margin-left:10px;margin-bottom:0">
		            <select name="province" id="province">
		            </select>
		            <select name="city" id="city">
		            </select>
	                <select name="county" id="county">
	                </select>
		        </div>
	    <div>
	        <select id="s_province" name="s_province"></select>&nbsp;&nbsp;
	        <select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
	        <select id="s_county" name="s_county"></select>
	        <script class="resources library" src="js/area.js" type="text/javascript"></script>
	        
	        <script type="text/javascript">_init_area();</script>
	        </div>
	        <div id="show"></div>
	    </div>
	</div>
	<?php } ?>
</div>
</form> -->
<div id="listmode_hot" style="padding-top:10px;width:96%;margin:0 auto;">
	<!-- <?php if(is_array($listHot)): $i = 0; $__LIST__ = $listHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div>
			<p style="background:#DFDFDF;height:30px;line-height:30px;text-align:left;margin:10px auto;">
				<?php if($list['store_type']==1){echo "地址:".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo "网址:".$list['address'];} ?>
			</p>
			<p style="margin:10px auto;font-size:14px;">
				<span>产品名称:<?php echo ($list["product_name"]); ?></span>
				<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
			</p>
			<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,20,"utf-8")); ?>...<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a></p>
			<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
		</div><?php endforeach; endif; else: echo "" ;endif; ?> -->
	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div style="background:white;box-shadow:1px 1px 1px #B8B6B7;border-radius:3px;border:solid 1px #D5D5D5;margin-bottom:10px;">
		<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><img src="<?php if($list['touxiang']){echo '/Uploads/Picture/User/'.$list['touxiang'];}else{echo '/Public/static/img/default_big.jpg';} ?>" style="height:40px;width:40px;display:block;float:left;margin:5px 10px;vertical-align: middle;"></a>
		<p style="float:left;line-height:25px;padding-left:10px;">
			<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><span style=""><?php echo ($list["uname"]); ?></span></a><br>	
		</p>
		<p style="clear:both"></p>
		<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>">
		<div style=";padding:0 10px;margin-top:-30px;margin-bottom:0px;margin-left:50px;">
			<!-- <p style="margin:10px auto;font-size:14px;">
				<span>产品名称:<?php echo ($list["product_name"]); ?></span>
				<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
			</p> -->
			<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,50,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
			<div style="">
				<?php if(is_array($list["image"])): $i = 0; $__LIST__ = array_slice($list["image"],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["thumb_img"]); ?>" style="width:30%;">&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<p style="color:#1C668D">商品名称：<?php echo ($list["product_name"]); ?></p>
			<p style="color:#1C668D">商品名称：<?php echo ($list["store_name"]); ?></p>
			<!-- <p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p> -->
			
			<p style="text-align:left;margin:10px auto;WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all">
				<?php if($list['store_type']==1){echo "<img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'>".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo $list['address'];} ?>
			</p>
			<span style="color:#898788;font-size:12px;"><?php echo (date("Y-m-d",$list["time"])); ?></span>
		</div>
		<div style="color:#888785;height:30px;line-height:30px;text-align:center;font-size:12px;border-top:solid 1px #D5D5D5">
			<p style="width:49%;float:left;border-right:solid 1px #D5D5D5">
				<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["comment_count"]); ?>)</p>
			<p style="width:49%;float:left">
				<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["collect_count"]); ?>)
			</p>
		</div>
		</a>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div style="text-align:center"><?php echo ($page); ?></div>
<script type="text/javascript">
	<?php if($store_type==1){ ?>
	// setup();
	var Gid  = document.getElementById ;
	var showArea = function(){
	    Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +    
	    Gid('s_city').value + " - 县/区" + 
	    Gid('s_county').value + "</h3>"
    }
	// Gid('s_county').setAttribute('onchange','showArea()');
	<?php } ?>
	$('.search_head').click(function(){
		if($('.search_head img').attr("src")=='/Public/static/img/xiala.jpg'){
			$('.search_head img').attr("src",'/Public/static/img/shangla.jpg');
		}else{
			$('.search_head img').attr("src",'/Public/static/img/xiala.jpg');
		}
		if($('#search_input').css("display")=='none'){
			$('#search_input').css("display","block");
		}else{
			$('#search_input').css("display","none");
		}
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