<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>网评如潮-发布差评</title>
<link rel="stylesheet" type="text/css" href="/Public/static/css/web_style.css">
<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
<script type="text/javascript" src="/Public/static/js/web_common.js"></script>
<script type="text/javascript" src="/Public/static/js/pccs.js"></script>
</head>
<body>
	
		<div class="base_left">
			<div class="base_left_top">
				<div style="width:98%;height:200px;margin:30px auto;margin-bottom:10px;border:solid 1px #C7C6C7;box-shadow:1px 1px 1px #C7C6C7">
					<div style="">
						<img src="<?php if(empty($conmon_user[0]['image'])){ echo 'Uploads/User/'.$conmon_user[0]['image']; }else{ echo '/Public/static/img/default_big.jpg'; } ?>" style="width:140px;height:140px;margin:10px;display:block">
					</div>
					<div>
						<ul>
							<li class="base_user">
								发布<br>
								<?php echo ($fabu_num); ?>
							</li>
							<li class="base_user">
								关注<br>
								<?php echo ($conmon_user["0"]["follow_count"]); ?>
							</li>
							<li class="base_user">
								粉丝<br>
								<?php echo ($conmon_user["0"]["fans_count"]); ?>
							</li>
						</ul>
					</div>
				</div>
				<p style="text-align:center">
					<?php echo ($conmon_user["0"]["account"]); ?>
				</p>
			</div>
			<div class="base_left_bottom">
				<a href="/home">
					<?php if($act == 'index'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_home.jpg" class="img_middle">
						首&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;页
					</p>
				</a>
				<a href="/home/act/addreview">
					<?php if($act == 'act'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_fabu.jpg" class="img_middle">
						发&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;布
					</p>
				</a>
				<a href="/home/index/searchIndex">
					<?php if($act == 'search'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_search.jpg" class="img_middle">
						搜索差评
					</p>
				</a>
				<a href="/home/user">
					<?php if($act == 'user'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_user.jpg" class="img_middle">
						个人中心
					</p>
				</a>
				<a href="/home/user/messageBox">
					<?php if($act == 'message'): ?><p class="base_left_daohang_on">
					<?php else: ?>
						<p class="base_left_daohang"><?php endif; ?>
						<img src="/Public/static/img/web_message.jpg" class="img_middle">
						消息中心
					</p>
				</a>
			</div>
		</div>
	
	
	<div class="base_right">
		<div id="fabu_top">
			<img src="/Public/static/img/web_logo_small.jpg" class="img_float_right mtop30">
			<p class="home_index_tab_on" style="width:180px;">发布网址差评</p>
			<p class="home_index_tab" style="width:180px;">发布实体店差评</p>
		</div>
		<div id="fabu_bottom">
			<form id="postForm" action="/home/act/saveAdd" method="post" enctype='multipart/form-data'> 
				<input type="hidden" name="store_type" value="0">
				<div class="fabu_index_left">
					<ul>
						<li>
							购买凭证&nbsp;<span style="color:red">*</span>
							<input onclick="as();" type="file" name="aaa1" multiple="multiple" accept="image/*" class="houseMaps" >
							<img src="/Public/static/img/addImg.gif" class="onhouseMaps">
						</li>
						<li>
							商品图片&nbsp;<span style="color:red">*</span>
							<input onclick="as();" id="goodsImg" type="file" name="aaa2[]" multiple="multiple" accept="image/*" class="houseMaps" >
							<img src="/Public/static/img/addImg.gif" class="onhouseMaps">
						</li>
						<li id="befor">
							<span style="color:red">添加图片</span>
							<img id="addImg" src="/Public/static/img/autoadd.jpg" class="onhouseMaps">
						</li>
						<div style="clear:both"></div>
					</ul>
					<input placeholder="请输入网址" type="text" id="tit" name="address" class="shitiName"><br>
					<input id="product" placeholder="请输入商品名称" type="text" name="product_name" class="shitiName">
					<div id="isshiti" style="display:none">
						<input placeholder="请输入店名" type="text" id="addrinfo" name="store_name" class="shitiName">
						<span class="shitiName">
							所在地&nbsp;&nbsp;
						</span>
			        	<select id="s_province" name="s_province"></select>&nbsp;-&nbsp;
			        	<select id="s_city" name="s_city" ></select>&nbsp;-&nbsp;
			        	<select id="s_county" name="s_county"></select>
			        
			        	<script type="text/javascript">_init_area();</script>
					</div>
					<textarea id="_content" name="content" placeholder="请输入内容" style="font-size:16px;" class="review_content"></textarea>
					<a id="add_submit" href="javascript:doact()"><img src="/Public/static/img/add_fabu.jpg"></a>
				</div>
			</form>
			<div class="fabu_index_right"></div>
			<div style="clear:both"></div>
		</div>
	</div>
	<script type="text/javascript">
		function doact(){
			if($('#tit').val()==''){
				alert('请输入地址或网址');
				return;
			}
			// alert($('#s_province').val());return;
			if($('#product').val()==''){
				alert('请输入产品名称');
				return;
			}
			if($('#isshiti').is(':visible') && ($('#s_province').val()=='省份' || $('#s_city').val()=='地级市' || $('#s_county').val()=='市、县级市')){
				alert('请选择地区');
				return;
			}
			if($('input[name=aaa1]').val()==''){
				alert('请选择购买凭证');return;
			}
			if($('#goodsImg').val()==''){
				alert('请选择商品图片');return;
			}

			if($('#_content').val()==''){
				alert('请输入内容');
				return;
			}
			if($("input[name=store_type]").val()==1 && $('#addrinfo').val()==''){
				alert('请输入店名');
				return;
			}
			
			$('#postForm').submit();
			
		}
	</script>

</body>
</html>