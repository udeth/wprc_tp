<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="home_index_list">
		<div style="padding:10px;">
			<div class="relative">
				<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>">
					<?php if($list["touxiang"] == ''): ?><img src="/Public/static/img/default_big.jpg" class="homo_list_touxiang">
					<?php else: ?>
						<img src="/Uploads/Picture/User/<?php echo ($list["touxiang"]); ?>"  class="homo_list_touxiang"><?php endif; ?>
				</a>
				<div class="absolute home_list_name">
					<a href="/home/user/userIntro?uid=<?php echo ($list["uid"]); ?>"><?php echo ($list["uname"]); ?></a><br>
					
				</div>
			</div>
			<div style="margin-left:65px;">
				<div class="mbottom tow_em font18">
					<?php echo (mb_substr($list["content"],0,120,'utf-8')); ?>
				</div>
				<p class="mbottom">
					<?php if(is_array($list["image"])): $i = 0; $__LIST__ = $list["image"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["thumb_img"]); ?>">&nbsp;&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
				</p>
				<p class="mbottom goods_color">
					投诉商品名称：<?php echo ($list["product_name"]); ?>
				</p>
				<p class="mbottom goods_color">
					投诉店家名称：<?php echo ($list["store_name"]); ?>
				</p>
				<p class="mbottom hone_index_address">
					<?php if($list["store_type"] == 1): ?><img src="/Public/static/img/address.jpg" class="img_middle" style="height:25px;">
						<?php echo ($list["province"]); echo ($list["city"]); echo ($list["district"]); echo ($list["address"]); ?>
					<?php else: ?>
						<?php echo ($list["address"]); endif; ?>
				</p>
				<span class="gry_small"><?php echo (date("Y-m-d h:i:s",$list["time"])); ?></span>
			</div>
		</div>
		<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>">
			<div class="index_list_bottom">
				<div class="index_list_bottom_div" style="border-right:solid 1px #D5D5D5">
					<img src="/Public/static/img/pinglun.jpg" class="img_middle">
					（<?php echo ($list["comment_count"]); ?>）
				</div>
				<div class="index_list_bottom_div">
					<img src="/Public/static/img/xingxing.jpg" class="img_middle">
					（<?php echo ($list["collect_count"]); ?>）
				</div>
			</div>
		</a>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>