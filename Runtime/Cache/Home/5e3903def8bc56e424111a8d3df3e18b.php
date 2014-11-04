<?php if (!defined('THINK_PATH')) exit();?><div id="inpage">
<div id="listmode_hot">
	<?php if(empty($data['list'])){echo"暂无网评信息!";} ?>
	<!-- <?php if(is_array($data["list"])): $i = 0; $__LIST__ = $data["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
		<div style="border:solid 1px #D4D0D1;margin-top:10px;">
		<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>">
			<div style="padding:0 10px">
				<p style="color:#1C668D">商品名称：<?php echo ($list["product_name"]); ?></p>
				<!-- <p style="margin:10px auto;font-size:14px;">
					<span>产品名称:<?php echo ($list["product_name"]); ?></span>
					<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
				</p> -->
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,50,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
				<div>
					<?php if(is_array($list["image"])): $i = 0; $__LIST__ = $list["image"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["thumb_img"]); ?>" style="width:30%">&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				
				<p style="text-align:left;margin:10px auto;WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all">
				<?php if($list['store_type']==1){echo "<img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'>".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo $list['address'];} ?>
				</p>
				<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
			</div>
			<div style="color:#888785;height:30px;line-height:30px;text-align:center;font-size:12px;border-top:solid 1px #D5D5D5">
				<p style="width:49%;float:left;border-right:solid 1px #D5D5D5">
					<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["comment_count"]); ?>)</p>
				<p style="width:49%;float:left">
					<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($list["collect_count"]); ?>)
				</p>
			</div></a>
		</div>
	<!--<?php endforeach; endif; else: echo "" ;endif; ?> -->
</div>
</div>

<script type="text/javascript">
	
</script>