<?php if (!defined('THINK_PATH')) exit();?><html>
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<meta name="viewport" content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no">
	<meta property="qc:admins" content="2444477762632251446654" />
	<script type="text/javascript" src="/Public/static/js/pccs.js"></script>
	<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
	<script type="text/javascript" src="/Public/static/js/ajaxfileupload.js"></script>
	<script type="text/javascript" src="/Public/static/js/js.js"></script>
	<title>网评潮流-发布差评</title>
	<link href="/Public/static/css/style.css" rel="stylesheet" type="text/css" />
	<style type="text/css">
		.searched{
			border-bottom:solid 2px #C70609;
			color:#FA794F;
		}
	</style>
	</head>
	<body>
		<div style="height:60px;width:100%;min-width:320px;max-width:768px;background:#C40507;position:fixed;top:0;z-index:9999">
			<a href="/home/index"><img src="/Public/static/img/logo.jpg" style="margin:10px;"></a>
			<img src="/Public/static/img/logo2.jpg" style="display:block;float:right;margin:5px">
		</div>
	
		<div style="width:100%;margin:0 auto;min-width:320px;max-width:768px;border-bottom:solid 1px #C7060B;position:fixed;top:60px;background:white;z-index:9999">
			<a href="/home/index"><div <?php if($act=='index'){ echo "class='searched'";} ?> style="width:24%;height:40px;float:left;text-align:center;line-height:40px;">
				首页
			</div></a>
			<a href="/home/act/addreview"><div <?php if($act=='act'){ echo "class='searched'";} ?> style="width:24%;height:40px;float:left;text-align:center;line-height:40px;">
				发布差评
			</div></a>
			<a href="/home/index/searchIndex"><div <?php if($act=='search'){ echo "class='searched'";} ?> style="width:24%;height:40px;float:left;text-align:center;line-height:40px;">
				搜索差评
			</div></a>
			<a href="/home/user/index"><div <?php if($act=='user'){ echo "class='searched'";} ?> style="width:24%;height:40px;float:left;text-align:center;line-height:40px;">
				个人中心
			</div></a>
			<div style="clear:both"></div>
		</div>
		<div style="margin-bottom:100px;"></div>
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
	<img src="/Public/static/img/xiala.jpg" style="display:block;float:right;margin:5px 5px 5px 10px"><span style="display:block;float:right;">精确查看</span>
</div>
<form method="post" action="/home/index/research">
<input type="hidden" name="kword" value="<?php echo ($kword); ?>">
<input type="hidden" name="store_type" value="<?php echo ($store_type); ?>">
<div id="search_input">

	<div style="margin:10px;">
		<input type="text" name="product" placeholder="请输入产品名称" value="<?php echo ($product); ?>" style="height:30px;line-heiht:30px;width:70%">
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
	</div>
	<?php } ?>
</div>
</form>
<div style="margin:80px 2% 10px 2%;">
<!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
		<div style="margin:10px auto;">
			<p style="background:#DFDFDF;height:30px;line-height:30px;text-align:right;margin:10px auto;">
				<?php if($list['store_type']==1){echo "地址:".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo "网址:".$list['address'];} ?>
			</p>
			<p style="margin:10px auto;font-size:14px;">
				<span>产品名称:<?php echo ($list["product_name"]); ?></span>
				<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
			</p>
			<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,20,"utf-8")); ?>...<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a></p>
			<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
		</div>
	<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
</div>
<div style="text-align:center"><?php echo ($page); ?></div>
<script type="text/javascript">
	setup();
</script>
<script type="text/javascript">
	
</script>

<?php if($_SESSION['think_loginInfo']||$_COOKIE['think_loginInfo']){}else{ ?>
<div style="position:fixed;background:rgba(255, 0, 0,0.5);height:60px;z-index:999;bottom:0;width:100%;min-width:320px;max-width:768px;">
	<p style="float:left;color:white;margin-left:5%"><span style="font-size:20px;">留下</span>你的购物<span style="font-size:20px;">差评</span></p>
	<div style="clear:both"></div>
	<p style="float:left;color:white;margin-left:15%">让别人买前<span style="font-size:20px;">查一查</span></p>
	<p style="margin-right:20px;margin-top:-10px;z-index:1000;text-align:right">
		<a href="/home/user/login"><span style="background:red;border-radius:3px;padding:5px 10px">登陆</span></a>
		<a href="/home/user/insert"><span style="background:orange;border-radius:3px;padding:5px 10px">注册</span></a>
	</p>
</div>
<?php } ?>
</body>
</html>