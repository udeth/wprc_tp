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
		}
		*{
			margin: 0;
			padding: 0;
		}
		a{
			text-decoration: none;
			color:black;
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
			<?php echo empty($userInfo[0]['name'])?$userInfo[0]['account']:$userInfo[0]['name']; ?> 个人主页
		</p>
		<a href="/home/index"><p id="toempty" style="float:right;width:18%;height:20px;line-height:20px;margin-top:15px;margin-right:10px;text-align:center;color:white"><img src="/Public/static/img/zhuye.jpg"></p></a>
	</div>
	<div style="margin:1%;margin-bottom:20px;">
		<div style="width:30%;float:left;max-width:150px;text-align:center">
			<img src="<?php echo empty($userInfo[0]['image'])?'/Public/static/img/default_big.jpg':'/Uploads/Picture/User/'.$userInfo[0]['image']; ?>" style="width:100px;height:100px;">
		</div>
		<div style="width:70%;float:left;">
			<p style="padding-left:10%;font-size:20px;margin-top:10px;"><?php echo empty($userInfo[0]['name'])?$userInfo[0]['account']:$userInfo[0]['name']; ?>&nbsp;&nbsp;&nbsp;<img src="/Public/static/img/<?php echo empty($userInfo[0]['sex'])?'sex_nv.jpg':'sex_nan.jpg'; ?>"></p>
			<p style="padding-left:10%;color:#999999;font-size:12px;margin-bottom:15px;">
				<?php echo ($userInfo["0"]["province"]); ?>省<?php echo ($userInfo["0"]["city"]); ?>市<?php echo ($userInfo["0"]["district"]); ?>
			</p>
			<p style="text-align:left;padding-left:10%;font-size:14px;">
				<a href="/home/user/message?id=<?php echo ($userInfo["0"]["uid"]); ?>" style="padding:5px 10px;text-decoration:none;color:white;height:40px;line-height:40px;background:#C7060B;border-radius:3px">私信</a>
				<span id="guanzhu" style="padding:5px 10px;color:white;height:40px;line-height:40px;background:#C7060B;border-radius:3px"><?php echo empty($guanzhu)?'+关注':'取消关注'; ?></span>
			</p>
		</div>
		<div style="clear:both"></div>
	</div>
	<div style="height:40px;border:solid 1px #D2D2D2;width:94%;margin:0 auto;border-radius:3px;padding:2%;text-align:center;font-size:14px;">
		<a href="/home/user/showUserInfo?uid=<?php echo ($userInfo["0"]["uid"]); ?>"><div style="width:25%;float:left">
			详细<br>资料
		</div></a>
		<a href="/home/user/userIntro?uid=<?php echo ($userInfo["0"]["uid"]); ?>&act=list"><div style="width:25%;float:left">
			发布<br><span style="color:#A4A2A3">（<?php echo ($num); ?>）</span>
		</div></a>
		<a href="/home/user/follow?type=1&uid=<?php echo ($userInfo["0"]["uid"]); ?>"><div style="width:25%;float:left">
			关注<br><span style="color:#A4A2A3">（<?php echo ($userInfo["0"]["follow_count"]); ?>）</span>
		</div></a>
		<a href="/home/user/follow?type=0&uid=<?php echo ($userInfo["0"]["uid"]); ?>"><div style="width:25%;float:left">
			被关注<br><span style="color:#A4A2A3">（<?php echo ($userInfo["0"]["fans_count"]); ?>）</span>
		</div></a>
	</div>
	
	
	<div id="listmode_new" style="width:96%;margin:0 auto;padding-top:10px;">
	<!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
		<div style="border:solid 1px #D4D0D1;margin-top:">
			<img src="<?php if($userInfo[0]['image']){echo '/Uploads/Picture/User/'.$userInfo[0]['image'];}else{echo '/Public/static/img/default_big.jpg';} ?>" style="height:30px;width:30px;display:block;float:left;margin:5px;vertical-align: middle;">
			<p style="float:left;height:50px;line-height:25px;padding-left:10px;">
				<span style=""><?php echo ($userInfo["0"]["name"]); ?></span><br>	
			</p>
			<p style="clear:both"></p>
		<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>">
			<div style="padding:0 10px;margin-left:40px;">
				<!-- <p style="margin:10px auto;font-size:14px;">
					<span>产品名称:<?php echo ($list["product_name"]); ?></span>
					<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
				</p> -->
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,50,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
				<div>
					<?php if(is_array($list["image"])): $i = 0; $__LIST__ = array_slice($list["image"],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr); ?>" style="width:30%">&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<p style="color:#1C668D">商品名称：<?php echo ($list["product_name"]); ?></p>
				<p style="color:#1C668D">商品名称：<?php echo ($list["store_name"]); ?></p>
				<p style="text-align:left;margin:10px auto;WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all">
				<?php if($list['store_type']==1){echo "<img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'>".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo $list['address'];} ?>
				</p>
				<span style="color:#898788;font-size:12px;"><?php echo (date("Y-m-d",$list["time"])); ?></span>
			</div>
			<!-- <p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p> -->
			<div style="color:#888785;height:30px;line-height:30px;text-align:center;font-size:12px;border-top:solid 1px #D5D5D5">
				<p style="width:49%;float:left;border-right:solid 1px #D5D5D5">
					<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["comment_count"]); ?>)</p>
				<p style="width:49%;float:left">
					<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["collect_count"]); ?>)
				</p>
			</div>
		</a>
		</div>
	<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
	</div>
	

	<script type="text/javascript">
		$('#guanzhu').click(function(){
			if($(this).text()=="+关注"){
				var act='add';
			}else{
				var act='del';
			}
			$.post('/home/act/follow',{id:"<?php echo $userInfo[0]['uid']; ?>",act:act},function(data){
				alert(data.msg);
				if(data.status==1){
					window.location.href=window.location.href;
				}
			},'json')
		});
	</script>
</body>
</html>