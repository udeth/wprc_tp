<?php if (!defined('THINK_PATH')) exit();?><div>
<!-- 
	<p class="open" style="margin-bottom:10px;"><strong>未读消息<?php echo ($data["count"]); ?>条</strong><img style="display:block;float:right;margin-right:20px;" src="/Public/static/img/shangla.jpg"></p>
	<div id="_myMsg">
	<?php if(is_array($data["msgArr"])): $i = 0; $__LIST__ = $data["msgArr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$msglist): $mod = ($i % 2 );++$i;?><div style="margin:10px auto">
			<p style="display:none"><?php echo ($msglist["id"]); ?></p>
			昵称：<?php echo ($msglist["name"]); ?><br>
			在【<a href="/home/act/reviewInfo?id=<?php echo ($msglist["review_id"]); ?>" style="color:red;"><?php if($msglist['store_type']==1) {echo $msglist['province'].$msglist['city'].$msglist['district'].$msglist['address'];}else{echo $msglist['address'];} ?></a>】中评论了我<br>
			评论时间:<?php echo (date("Y-m-d",$msglist["time"])); ?>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div> -->
	<!-- <p class="open" style="margin-bottom:10px;"><strong>我收到的消息</strong><img style="display:block;float:right;margin-right:20px;" src="/Public/static/img/xiala.jpg"></p> -->

	<div id="my_tab" style="width:96%;margin:0 auto;text-align:center;">
		<p class="my_tab_on" style="width:49%;float:left">收到的消息</p>
		<p class="my_tab_off" style="width:49%;float:left">发送的消息</p>
		<div style="clear:both"></div>
	</div>
	<img id="my_xia" src="/Public/static/img/my_xia.jpg" style="width:20px;height:7px;margin-left:22%;margin-bottom:15px;">

	<div id="savelist" style="">
	<?php if(is_array($data["mySave"])): $i = 0; $__LIST__ = $data["mySave"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$savelist): $mod = ($i % 2 );++$i;?><span style="color:red"><?php echo ($savelist["name"]); ?></span>评论了你<br>
		<span style="color:#898788;font-size:12px;"><?php echo (date("Y-m-d",$savelist["rtime"])); ?></span>
		<a href="/home/act/reviewInfo?id=<?php echo ($savelist["id"]); ?>">
		<div style="border:solid 1px #D4D0D1;margin-top:10px;">
			<div style="padding:0 10px;">
				<p style="margin:10px auto;font-size:14px;">
					<span>商品名称:<?php echo ($savelist["product_name"]); ?></span>
				</p>
				<!-- <div>
					<?php if(is_array($savelist["image"])): $i = 0; $__LIST__ = $savelist["image"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["image"]); ?>" style="width:30%"><?php endforeach; endif; else: echo "" ;endif; ?>
				</div> -->
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($savelist["content"],0,50,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
				<p style="text-align:left;margin:10px auto;WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all">
					<?php if($savelist['store_type']==1){echo "<img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'>".$savelist['province'].$savelist['city'].$savelist['district'].$savelist['address'];}else{echo $savelist['address'];} ?>
				</p>
				<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$savelist["time"])); ?></p>
			</div>
			<div style="color:#888785;height:30px;line-height:30px;text-align:center;font-size:12px;border-top:solid 1px #D5D5D5">
				<p style="width:49%;float:left;border-right:solid 1px #D5D5D5">
				<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($savelist["comment_count"]); ?>)</p>
			<p style="width:49%;float:left">
				<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($savelist["collect_count"]); ?>)
			</p>
			</div>
		</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<!-- <p class="open"><strong>我发出的消息</strong><img style="display:block;float:right;margin-right:20px;" src="/Public/static/img/xiala.jpg"></p> -->
	<div id="sendlist" style="display:none">
	<?php if(is_array($data["mySend"])): $i = 0; $__LIST__ = $data["mySend"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sendlist): $mod = ($i % 2 );++$i;?>你评论了<span style="color:red"><?php echo ($sendlist["name"]); ?></span><br>
		<span style="color:#898788;font-size:12px;"><?php echo (date("Y-m-d",$sendlist["rtime"])); ?></span>
		<a href="/home/act/reviewInfo?id=<?php echo ($sendlist["id"]); ?>">
		<div style="border:solid 1px #D4D0D1;margin-bottom:15px;">
			<div style="padding:0 10px;">
				<p style="margin:10px auto;font-size:14px;">
					<span>产品名称:<?php echo ($sendlist["product_name"]); ?></span>
				</p>
				<!-- <div>
					<?php if(is_array($sendlist["image"])): $i = 0; $__LIST__ = $sendlist["image"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img src="/<?php echo ($arr["image"]); ?>" style="width:30%"><?php endforeach; endif; else: echo "" ;endif; ?>
				</div> -->
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($sendlist["content"],0,50,"utf-8")); ?>...<!-- <a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a> --></p>
				<p style="text-align:left;margin:10px auto;WORD-WRAP: break-word;TABLE-LAYOUT: fixed;word-break:break-all">
					<?php if($savelist['store_type']==1){echo "<img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'>".$savelist['province'].$savelist['city'].$savelist['district'].$savelist['address'];}else{echo $savelist['address'];} ?>
				</p>
				<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$sendlist["time"])); ?></p>
			</div>
			<div style="color:#888785;height:30px;line-height:30px;text-align:center;font-size:12px;border-top:solid 1px #D5D5D5">
				<p style="width:49%;float:left;border-right:solid 1px #D5D5D5">
				<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($sendlist["comment_count"]); ?>)</p>
			<p style="width:49%;float:left">
				<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;(<?php echo ($sendlist["collect_count"]); ?>)
			</p>
			</div>
		</div></a><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
</div>

<script type="text/javascript">
	var obj=new Object;
	obj.obj1=1;
	obj.obj2=0;
	obj.obj3=0;
	$('.open').click(function(){
		if($(this).next().css('display')=='none'){
			$(this).next().css('display','block');
		}else{
			$(this).next().css('display','none');
		}
		if($(this).children('img').attr("src")=='/Public/static/img/shangla.jpg'){
			$(this).children('img').attr("src","/Public/static/img/xiala.jpg");
		}else{
			$(this).children('img').attr("src","/Public/static/img/shangla.jpg");
		}
	});

	$('#_myMsg a').click(function(){
		var id=$(this).parent().children('p').text();	
		var jumpUrl=$(this).attr("href");
		$.post("/home/user/changeMsg",{id:id},function(data){
			if(data.status==1){
				window.location.href=jumpUrl;
			}
		},'json');
		return false;
	});

	$('#my_tab p').click(function(){
		$('#my_tab p').each(function(){
			$(this).removeClass("my_tab_on");
			$(this).removeClass("my_tab_off");
		});
		$(this).addClass('my_tab_on');
		$(this).siblings('p').each(function(){
			$(this).addClass("my_tab_off");
		});
		if($(this).text()=='收到的消息'){
			$('#savelist').show();
			$('#sendlist').hide();
			$('#my_xia').css("marginLeft","22%");
		}else{
			$('#savelist').hide();
			$('#sendlist').show();
			$('#my_xia').css("marginLeft","72%");
		}
	});
</script>