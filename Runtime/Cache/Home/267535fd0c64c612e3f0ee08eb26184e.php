<?php if (!defined('THINK_PATH')) exit();?>

	<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div style="background:white;box-shadow:1px 1px 1px #B8B6B7;border-radius:3px;border:solid 1px #D5D5D5;margin-bottom:10px;">
		<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><img src="<?php if($list['touxiang']){echo '/Uploads/Picture/User/'.$list['touxiang'];}else{echo '/Public/static/img/default_big.jpg';} ?>" style="height:40px;width:40px;display:block;float:left;margin:5px 10px;vertical-align: middle;"></a>
		<p style="float:left;line-height:25px;padding-left:10px;">
			<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><span style=""><?php echo ($list["uname"]); ?></span></a><br>	
		</p>
		<p style="clear:both"></p>
		<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>">
		<div style="padding:0 10px;margin-bottom:0px;margin-left:60px;margin-top:-30px">
			<!-- <p style="margin:10px auto;font-size:14px;">
				<span>产品名称:<?php echo ($list["product_name"]); ?></span>
				<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
			</p> -->
			<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,100,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
			<div style="">
				<?php if(is_array($list["image"])): $i = 0; $__LIST__ = array_slice($list["image"],0,3,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["thumb_img"]); ?>" style="width:30%;">&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			
			<p style="color:#1C668D">投诉商品名称：<?php echo ($list["product_name"]); ?></p>
			<p style="color:#1C668D">投诉店家名称：<?php echo ($list["store_name"]); ?></p>
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


<!-- 		<div>
			<p style="background:#DFDFDF;height:30px;line-height:30px;text-align:right;margin:10px auto;">
				<?php if($list['store_type']==1){echo "地址:".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo "网址:".$list['address'];} ?>
			</p>
			<p style="margin:10px auto;font-size:14px;">
				<span>产品名称:<?php echo ($list["product_name"]); ?></span>
				<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
			</p>
			<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,20,"utf-8")); ?>...<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a></p>
			<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
		</div> -->