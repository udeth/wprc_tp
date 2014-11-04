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
		<div class="review_tab" style="margin-bottom:15px;"><!-- 发布差评切换 Begin -->
			<div class="review_tab_on">网址差评</div>
			<div class="review_tab_off">实店差评</div>
		</div><!-- 发布差评切换 End -->
		<!-- <img id="my_xia" src="/Public/static/img/my_xia.jpg" style="width:20px;height:7px;margin-left:22%;margin-bottom:15px;margin-top:-3px"> -->

		<div class="review_main"><!-- 发布内容 Begin -->
			<form id="postForm" action="/home/act/saveAdd" method="post" enctype='multipart/form-data'> 
			<input type="hidden" name="store_type" value="0">
			<div style="margin-bottom:0" id="imgArr">
				<p style="width:30%;float:left;margin-bottom:0;text-align:center">
					<input onclick="as();" style="position:absolute;opacity:0;width:80px;height:80px;" type="file" name="aaa1" multiple="multiple" accept="image/*" class="houseMaps" />
					<img src="/Public/static/img/addImg.gif" style="width:80px;height:80px;"><br>
					购买凭证
				</p>
				<!-- <p style="width:30%;float:left;margin-bottom:0;margin-left:1%;text-align:center">
					<input onclick="as();" style="position:absolute;opacity:0;width:80px;height:80px;" type="file" name="aaa2" multiple="multiple" accept="image/*" class="houseMaps" />
					<img src="/Public/static/img/addImg.gif" style="width:80px;height:80px;"><br>
					发票图片
				</p> -->
				<p style="width:30%;float:left;margin-bottom:0;margin-left:1%;text-align:center">
					<input onclick="as();" style="position:absolute;opacity:0;width:80px;height:80px;" type="file" id="goodsImg" name="aaa2[]" multiple="multiple" accept="image/*" class="houseMaps" />
					<img src="/Public/static/img/addImg.gif" style="width:80px;height:80px;"><br>
					商品图片
				</p>
				<p  id="befor" style="width:30%;float:left;margin-bottom:0;margin-left:1%;text-align:center">
					
					<img id="addImg" src="/Public/static/img/addImg.gif" style="width:80px;height:80px;"><br>
					继续添加
				</p>
			</div>
			<div style="clear:left"></div>
				<!-- <button id="addImg">增加</button> -->
			<p class="review_intro">1.支持jpg、png格式</p>
			<p class="review_intro">2.建议在wifi环境下上传图片</p>
			<div><input placeholder="" type="text" id="tit" name="address" class="shitiName"></div>
			<div><input id="product" placeholder="请输入投诉商品名称" type="text" name="product_name" class="shitiName"></div>
        	<div><input placeholder="请输入投诉店家名称" type="text" id="addrinfo" name="store_name" class="shitiName"></div>
			
			<div id="area" style="overflow:hidden">
		        <div style="margin-top:10px">
		        </div><br>
				<span style="display:block;float:left;font-size:16px;">地域:</span>
		        <div>
		        	<select id="s_province" name="s_province"></select>&nbsp;&nbsp;
		        	<select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
		        	<select id="s_county" name="s_county"></select>
		        
		        	<script type="text/javascript">_init_area();</script>
	        	</div>
	        	<div id="show"></div>
    		</div>
    		
			<!-- <div style="overflow:hidden">
				<span style="display:block;float:left;font-size:16px;">选择商品类别</span>
				<select style="margin-left:10px" id="product_category">
					<option value="1">第一</option>
				</select>
			</div>
			<div style="overflow:hidden">
				<span style="display:block;float:left;font-size:16px;">评论内容</span>
				<select id="select_content" style="margin-left:10px">
					<option>第一条第一条第一条第一条</option>
					<option>第2条第2条第一条第一条</option>
				</select>
			</div> -->
			<textarea id="_content" name="content" placeholder="请输入内容" style="font-size:16px;" class="review_content"></textarea>
			
		</div><!-- 发布内容 End -->
		
		<div><!-- 确认发布 Begin -->
			<a class="head_toreview" href="javascript:doact();"><strong>确定发布</strong></a>
		</div><!-- 确认发布 End -->
</form>
		<!-- <div>
			
			<input type="button" value="提交" onclick="ajaxFileUpload()"/>  
		</div> -->
		<script type="text/javascript"> 
			// setup();
			var type=<?php echo $type; ?>;
			if(type==1){
				$('#tit').attr("placeholder","请输入地址");
				$('#area').show();
			}else{
				$('#tit').attr("placeholder","请输入网址");
				$('#area').hide();
			}
			$('.review_tab div').click(function(){
				$('.review_tab div').each(function(){
					$(this).removeClass("review_tab_off");
					$(this).removeClass("review_tab_on");
				});
				$(this).addClass("review_tab_on");
				$(this).siblings().each(function(){
					$(this).addClass("review_tab_off");
				});
				if($(this).text()=="网址差评"){
					$('#my_xia').css("marginLeft","22%");
					$('#my_xia').css("marginTop","-3px");
				$('#tit').attr("placeholder","请输入网址");
					$("input[name=store_type]").val("0");
					$('#area').hide();
				}else{	
					$('#my_xia').css("marginLeft","72%");
					$('#my_xia').css("marginTop","-3px");
					$('#tit').attr("placeholder","请输入地址");
					$("input[name=store_type]").val("1");
					$('#area').show();
				}
			});
			$('#select_content').change(function(){
				$('#_content').text($(this).val());
			});
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
				if($('#area').is(':visible') && ($('#s_province').val()=='省份' || $('#s_city').val()=='地级市' || $('#s_county').val()=='市、县级市')){
					alert('请选择地区');
					return;
				}
				if($('input[name=aaa1]').val()==''){
					alert('请选择购买凭证');return;
				}
				if($('#goodsImg').val()==''){
					alert('请选择商品图片');return;
				}
				
				$('#postForm').submit();
				
			}

			$(function(){
			$('#addImg').on('click',function(){
			// $('#addImg').click(function(){
				if($(this).parent().prev().children('input').val()==''){
					alert("请先选择前一张图片");
					return false;
				}
				$('#befor').before("<p style='width:30%;float:left;margin-bottom:0;margin-left:1%;text-align:center'><input style='position:absolute;opacity:0;width:80px;height:80px;' type='file' name='aaa2[]' multiple='multiple' accept='image/*' class='houseMaps' onclick='as();' /><img src='/Public/static/img/addImg.gif' style='width:80px;height:80px;'><br>商品图片</p>");
			});
			});

			// $(".houseMaps").change(function(){
			function as(){
			$('.houseMaps').on('change',function(){
			    var objUrl = getObjectURL(this.files[0]) ;
			    console.log("objUrl = "+objUrl) ;
			    if (objUrl) {
			        $(this).next().attr("src", objUrl) ;
			    }
			}) ;}
			//建立一個可存取到該file的url
			function getObjectURL(file) {
			    var url = null ; 
			    if (window.createObjectURL!=undefined) { // basic
			        url = window.createObjectURL(file) ;
			    } else if (window.URL!=undefined) { // mozilla(firefox)
			        url = window.URL.createObjectURL(file) ;
			    } else if (window.webkitURL!=undefined) { // webkit or chrome
			        url = window.webkitURL.createObjectURL(file) ;
			    }
			    return url ;
			}
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