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
			<a href="/home/user/messageBox"><img src="/Public/static/img/fanhui.jpg"></a>
		</p>
		<p style="width:63%;float:left;height:50px;line-height:50px;text-align:center;color:white">
			<?php echo ($uInfo["0"]["name"]); ?>
		</p>
		<p id="toempty" style="float:right;width:18%;height:30px;line-height:30px;margin-top:10px;margin-right:10px;text-align:center;background:#FFAA00;color:white">清空</p>
	</div>
	
	<textarea id="content" style="width:96%;margin:0 auto;border:solid 1px #D2D2D2;height:60px;display:block"></textarea> 
	<p style="width:96%;margin:0 auto;text-align:right;color:#999999">140字</p>
	<button id="send" style="display:block;height:30px;color:white;font-size:18px;background:#18ABF6;width:90px;border:0;float:right;margin-right:2%">发送</button>
	<div style="clear:both"></div>

	<div style="width:92%;padding:10px 2%;margin:0 auto">
		<!-- <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?>-->
			<div>	
				<?php if($list['add'] == 1): ?><div style="margin-bottom:20px;color:#999999">
					<div style="float:left;text-align:left;width:33%"><del>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</del></div>
					<div style="float:left;text-align:center;width:33%"><?php echo (date("Y-m-d",$list["time"])); ?></div>
					<div style="float:left;text-align:right;width:33%"><del>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</del></div>
					<div style="clear:both"></div>
				</div><?php endif; ?>
				<p style="color:#A4A2A3;font-size:12px;text-align:center;margin:10px 0"><?php echo (date("h:i:s",$list["time"])); ?></p>
				<img src="/<?php if($list['type']=='send'){echo empty($myInfo[0]['image'])?'Public/static/img/default_big.jpg':'Uploads/Picture/User/'.$myInfo[0]['image'];}else{echo empty($uInfo[0]['image'])?'Public/static/img/default_big.jpg':'Uploads/Picture/User/'.$uInfo[0]['image'];} ?>" style="float:<?php echo $list['type']=='send'?'right':'left'; ?>;width:18%;min-width:40px;max-width:40px;height:40px;">
				<?php if($list['type'] == 'save'): ?><div style="border:solid 1px white;float:left;width:82%;position:relative;padding-top:10px;">
						<div style="position:absolute;width:0;height:0;border:solid 15px #D5D5D5;border-color:transparent #D5D5D5 transparent transparent;top:15px;left:-3px;"></div>
						<div style="margin:5px 0 20px 20px;">
							<span style="display:inline-block;text-align:left;background:#D5D5D5;padding:10px;border-radius:5px;"><?php echo ($list["content"]); ?></span>
						</div>
					</div>
				<?php else: ?>
					<div style="border:solid 1px white;float:right;width:82%;position:relative;padding-top:10px;">
						<div style="position:absolute;width:0;height:0;border:solid 15px #D5D5D5;border-color:transparent transparent transparent #D5D5D5;top:15px;right:-3px;"></div>
						<div style="text-align:right;margin:5px 20px 20px; 0;">
							<span style="display:inline-block;text-align:left;background:#D5D5D5;padding:10px;border-radius:5px;"><?php echo ($list["content"]); ?></span>
						</div>
					</div><?php endif; ?>
				<div style="clear:both"></div>
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

		$('#send').click(function(){
			var content=$('#content').val();
			if(content==''){
				alert('内容不能为空');
				return false;
			}
			$.post('/home/user/sendMessage',{sendId:"<?php echo $myInfo[0]['uid'] ?>",saveId:"<?php echo $uInfo[0]['uid'] ?>",content:content},function(data){
				if(data.status==1){
					alert("发送成功！");
					window.location.href=window.location.href;
				}else{
					alert("发送失败！");
				}
			},'json')
		});

		$('#toempty').click(function(){
			var content=$('#content').val();
			$.post('/home/user/toEmpty',{sendId:"<?php echo $myInfo[0]['uid']; ?>",saveId:"<?php echo $uInfo[0]['uid'] ?>"},function(data){
				if(data.status==1){
					alert("操作成功！");
					window.location.href='/home/user/messageBox';
				}else{
					alert("操作失败！");
				}
			},'json')
		});
	</script>
</body>
</html>