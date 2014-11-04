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
<div style="width:96%;margin:0 auto">
	<div style="background:#DFDFDF;height:30px;line-height:30px;text-align:left;margin:10px auto;">
		<?php if($_GET['uid']>0){ echo ($user); ?>-<?php } ?>
		<?php if($type==1){ ?>关注列表<?php }else{ ?>被关注列表<?php } ?>

	</div>
	<!-- <?php if(is_array($followList)): $i = 0; $__LIST__ = $followList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
	<div>
		<div style="position:relative;height:60px;">
		<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><img src="/Uploads/Picture/User/<?php echo ($list["image"]); ?>" class="touxiang" style="position:absolute;height:50px;width:50px;"></a>
		<span style="position:absolute;left:60px">昵称：<?php echo ($list["name"]); ?></span>
		<!-- <span style="position:absolute;left:180px">性别：<?php if($list['sex']==0){echo "女";}else{echo "男";} ?></span> -->
		<span style="position:absolute;left:60px;top:30px">关注：<?php echo ($list["follow_count"]); ?></span><span style="position:absolute;left:160px;top:30px;">被关注：<?php echo ($list["fans_count"]); ?></span>
		<div style="display:none" class="id"><?php echo ($list["uid"]); ?></div>
		<button class="add_follow" uid="<?php echo ($list["wangping"]["uid"]); ?>" style="position:absolute;right:0px;top:15px"><?php if($list['myfollow']==1){ echo "取消关注";}elseif($list['myfollow']==0){echo "+关注";}else{ echo "自己"; } ?></button>
		<div style="clear:both"></div>
		</div>
	</div>
	<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
</div>
<script type="text/javascript">
	$('.add_follow').click(function(){
		if($(this).text()=='自己'){
			return false;
		}else{
			var act;//="<?php if($type==0){echo 'add';}else{echo 'del';} ?>";
			if($(this).text()=='取消关注'){
				act='del';
			}else{
				act='add';
			}
			var id=$(this).prev().text();
	 		$.post("/home/act/follow",{id:id,act:act},function(data){
	 			alert(data.msg);
	 			if(data.status==1){
	 				window.location.href=window.location.href;
	 			}
	 		},'json');
 		}
 	// alert($(this).text());
	});
</script>

<script type="text/javascript">
	
</script>

<?php if($_SESSION['loginInfo']||$_COOKIE['think_loginInfo']){}else{ ?>
<div id="public_close" style="position:fixed;background:rgba(200, 200, 200,0.7);height:25px;z-index:999;bottom:60px;width:50px;text-align:center;right:0">
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
</div>
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

$('#public_close').click(function(){
	$('#public_close').hide();
	$('#public_foot').hide();
})


</script>
</body>
</html>