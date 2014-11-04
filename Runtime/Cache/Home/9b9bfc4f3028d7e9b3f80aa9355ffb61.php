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


<div style="padding:10px">
		<a href="/home/user/userIntro?uid=<?php echo ($list["wangping"]["uid"]); ?>"><span style="font-size:20px;"><?php echo ($list["wangping"]["name"]); ?></span></a><br>
		<span style="color:#898788;font-size:14px;margin-top:5px;"><?php echo (date("Y-m-d",$list["wangping"]["time"])); ?></span>
		<button id="add_follow" uid="<?php echo ($list["wangping"]["uid"]); ?>" style="display:block;float:right;margin-top:-15px;border:0;font-size:16px;background:#C7060B;height:30px;width:70px;color:white;border-radius:3px;"><?php if($guanzhu==0){ ?>+关注<?php }else{ ?>取消关注<?php } ?></button>
	<div style="border:solid 1px #E9E7E7;padding:10px">
	
	
	<div style="margin-bottom:10px;">
		<p style="text-indent:2em"><?php echo ($list["wangping"]["content"]); ?></p>
	</div>
	<!-- <p style="margin-bottom:15px">发布时间：<?php echo (date("Y-m-d",$list["wangping"]["time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;评论数：<?php echo ($list["wangping"]["comment_count"]); ?></p> -->
	
	<div>
		<?php if(is_array($list["wangping"]["imgArr"])): $i = 0; $__LIST__ = $list["wangping"]["imgArr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img class="imgInfo" src="/<?php echo ($arr); ?>" style="width:30%;">&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<p style="font-size:14px;"><?php if($list['wangping']['store_type']==1){ ?><img src='/Public/static/img/address.jpg' style='height:25px;vertical-align: middle;'><?php echo ($list["wangping"]["province"]); ?>&nbsp;<?php echo ($list["wangping"]["city"]); ?>&nbsp;

<?php echo ($list["wangping"]["district"]); ?>&nbsp;<?php echo ($list["wangping"]["store_name"]); ?>&nbsp;<?php }else{ echo ($list["wangping"]["address"]); } ?></p>
	<div style="color:#888785;height:30px;line-height:30px;font-size:12px;">
		<img src="/Public/static/img/pinglun.jpg" style="vertical-align: middle;">&nbsp;评论(<?php echo ($list["wangping"]["comment_count"]); ?>)&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|

&nbsp;&nbsp;&nbsp;&nbsp;
		<img src="/Public/static/img/xingxing.jpg" style="vertical-align: middle;">&nbsp;收藏(<?php echo ($list["wangping"]["collect_count"]); ?>)
	</div>
	
	<div style="width:100%;margin:10px auto">
		<textarea id="reply" style="width:100%;height:60px;margin:0 auto;border:solid 1px #858585"></textarea>
		<span style="color:#797979;margin-top:10px;display:block;float:left;">(限定120个字)</span>
		<button id="doreply" style="display:block;border:0;background:#838383;border-radius:3px;float:right;width:80px;height:30px;margin-top:7px;color:white">发送评论</button>
		<button id="collect" style="border:0;background:#838383;border-radius:3px;color:white;display:block;float:right;width:80px;height:30px;margin-top:7px;margin-right:10px"><?php if($shoucang==1){ echo "已收藏";}else{echo "☆收藏";} ?></button>
		<div style="clear:both"></div>
	</div>
</div>
	<?php if(is_array($list["pinglun"])): $i = 0; $__LIST__ = $list["pinglun"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$row): $mod = ($i % 2 );++$i;?><div style="margin:10px auto">
			<a href="/home/user/userIntro?uid=<?php echo ($row["uid"]); ?>"><div style="float:left;width:55px;;">
				<img src="/<?php if(empty($row['image'])){echo "Public/static/img/default_big.jpg";}else{echo 'Uploads/Picture/User/'.$row['image'];} ?>" style="display:block;width:50px;height:50px;vertical-align: middle;">
			</div></a>
			<div style="font-size:14px;float:left;width:80%">
				<a href="/home/user/userIntro?uid=<?php echo ($row["uid"]); ?>"><span style="display:block;width:40%;"><?php echo ($row["name"]); ?>:</span></a>
				<div style="vertical-align:middle;width:100%;display:inline-block;border:0;margin-top:10px;"><?php echo ($row["content"]); ?></div>
				<!-- <span style="display:block;text-align:left">评论时间：<?php echo (date("Y-m-d",$row["time"])); ?></span> -->
				<div class="huifuid" name="<?php echo ($row["uid"]); ?>" style="display:none"><?php echo ($row["id"]); ?></div>
				<p style="margin-top:10px;margin-bottom:10px;color:#838383"><span><?php echo (date("Y-m-d",$row["time"])); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="reply" style="border:0;text-decoration: underline;">回复</span></p>
				<div style="clear:both"></div>
			</div>
			<div style="clear:both"></div>
			<?php if(is_array($row["list"])): $i = 0; $__LIST__ = array_slice($row["list"],0,5,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$inrow): $mod = ($i % 2 );++$i;?><div style="padding-left:50px;margin-bottom:10px;">
				<div style="float:left;width:55px;;">
					<img src="/<?php if(empty($inrow['image'])){echo "Public/static/img/default_big.jpg";}else{echo 'Uploads/Picture/User/'.$inrow['image'];} ?>" style="display:block;width:50px;height:50px;vertical-align: middle;">
				</div>
				<span style=""><?php echo ($inrow["name"]); ?>&nbsp;&nbsp;<span style="color:black">回复</span>&nbsp;&nbsp;<?php echo ($inrow["rename"]); ?></span>：&nbsp;
				<span><?php echo ($inrow["content"]); ?></span>
				<div style="clear:both"></div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<div id="rid" style="display:none"><?php echo ($id); ?></div>
<div style="text-align:center;margin-bottom:15px"><?php echo ($page); ?></div>


<!-- 图片查看层 -->
<div id="ass" style="z-index:9999999;position:fixed;width:100%;height:100%;overflow:hidden;display:none;background:#272822;top:0;bottom:0">
<div id="imgInfo" style="width:100%;">
	<?php if(is_array($list["wangping"]["bigImgArr"])): $i = 0; $__LIST__ = $list["wangping"]["bigImgArr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="cl1">
			<img src="/<?php echo ($arr); ?>" style="width:98%">
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</div>
<!-- 模态框 -->
<div id="mode" style="display:none;width:100%;margin:0 auto;height:100%;position:fixed;top:0;left:0;background:rgba(0,0,0,0.5);z-index:9999">
	<div style="width:90%;height:200px;background:white;max-width:768px;top:120px;position:fixed;left:5%">
		<textarea id="recontent" style="width:90%;height:100px;margin:20 auto;display:block"></textarea>
		<div style="text-align:center"><button id="sure">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="quxiao">取消</button></div>
	</div>
</div>

<script type="text/javascript">

	var screenHeight=window.screen.height;
	var screenWidth=window.screen.width;
	var obj = document.getElementById('imgInfo');
	var startX;var endX;
	var nowImg;
	var marginleft;
	var countImg=<?php echo count($list['wangping']['imgArr']); ?>;
	//定义图片模块
	
	 $('#imgInfo').css({'width':countImg*screenWidth+'px','height':screenHeight+'px'});
	$('.cl1').each(function(){
		$(this).css({'width':screenWidth+"px",'height':screenHeight+"px",'display':'table-cell','text-align':'center','vertical-align':'middle','overflow':'hidden'})
	});

	//找出当前显示的图片
	$('.imgInfo').click(function(){
		// var imgSrc=$(this).attr('src');
		var path=$(this).attr("src").split("/");
		path[path.length-1]=path[path.length-1].substr(7);
		var imgSrc='';
		for(var i=1;i<path.length;i++){
			imgSrc += "/"+path[i];
		}
		$('.cl1').each(function(){
			if($(this).children().attr('src')==imgSrc){
				nowImg = $(this);
			}
		})
		var page=nowImg.prevAll().length;//alert(page);
		$('#imgInfo').css({'marginLeft':-page*screenWidth+'px'});
		$('#ass').prevAll().each(function(){$(this).hide()});
		$('#ass').fadeIn(300);
	});
	
	
	obj.addEventListener('touchstart', function(event) {
	     // 如果这个元素的位置内只有一个手指的话
	    if (event.targetTouches.length == 1) {
			// event.preventDefault();// 阻止浏览器默认事件，重要 
	        var touch = event.targetTouches[0];
	        // 把元素放在手指所在的位置
	        startX=touch.pageX; //记录开始时手指的X坐标
	        marginleft=parseInt($('#imgInfo').css('marginLeft'));
        }
	}, false);
	obj.addEventListener('touchmove', function(event) {
	     // 如果这个元素的位置内只有一个手指的话
	    if (event.targetTouches.length == 1) {
			event.preventDefault();// 阻止浏览器默认事件，重要 
	       var touch = event.targetTouches[0];
	        // 把元素放在手指所在的位置
	        endX=touch.pageX; 
	        $('#imgInfo').css('marginLeft',marginleft+endX-startX+'px');
        }
	}, false); 

	obj.addEventListener('touchend', function(event) {
     	if(endX-startX>30 || startX-endX>30){
			marginleft=marginleft+endX-startX;
	        $('#imgInfo').css('marginLeft',marginleft+'px');
	        if(parseInt($('#imgInfo').css('marginLeft'))!=0){
	        	var num=parseFloat($('#imgInfo').css('marginLeft'));
	        	var big= parseInt(-num/screenWidth);   //已经经过几张图
	        	var small=-(big+num/screenWidth);     //滑动的比例
	        	if(small>0.5){
	        		$('#imgInfo').animate({marginLeft:-(big+1)*screenWidth+'px'},'speed');
	        	}else{
					$('#imgInfo').animate({marginLeft:-(big)*screenWidth+'px'},'speed');
	        	}
	        }
	        if(parseInt($('#imgInfo').css('marginLeft')) > 0){
	        	$('#imgInfo').animate({marginLeft:'0px'},'speed');
	        }else if(parseInt($('#imgInfo').css('marginLeft'))<-(countImg-1)*screenWidth){
	        	$('#imgInfo').animate({marginLeft:-(countImg-1)*screenWidth+'px'},'speed');
	        }
        }
	}, false); 

	$('#ass').click(function(){
		$('#ass').prevAll().each(function(){$(this).show();});$(this).fadeOut(300);
		// $('body').css('overflow','auto');
		document.getElementsByTagName('meta')[1].content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no";
		$('#rid').hide();
	});


	//定义图片动作函数  obj->dom对象;act->图片操作方法
	function touchImg(obg,act){

	}

	//执行关注和取消关注
	$('#add_follow').click(function(){
		$(window).scroll(function(){
			return false;
		});
		var id=$(this).attr("uid");
		if($(this).text()=="+关注"){
			var act='add';
		}else{
			var act='del';
		}
		// alert(id);return false;
		$.post('/home/act/follow',{id:id,act:act},function(data){
			alert(data.msg);
			if(data.status==1){
				window.location.href=window.location.href;
			}
		},'json')
	});
	//回复主题
	$('#doreply').click(function(){
		var content=$('#reply').val();  //回复的内容
		var id=$('#add_follow').attr("uid");  //发帖人ID
		var rid=$('#rid').text();    //主题的ID
		if(content==''){
			alert("请输入内容");
			return false;
		}
		$.post('/home/act/replay',{uid:id,content:content,rid:rid},function(data){
			alert(data.msg);
			if(data.status==1){
				window.location.href=window.location.href;
			}
			if(data.status==-2){
				alert("请先登录");
				window.location.href="/home/user/login";
			}
		},'json')
	});
	var pid;
	var reuid;
	$('.reply').click(function(){
		$('#mode').show();
		pid=$(this).parent().prev('.huifuid').text(); //楼ID
		reuid=$(this).parent().prev('.huifuid').attr("name");
	});
	$('#quxiao').click(function(){
		$('#recontent').val('');
		$('#mode').hide();
	});
	$('#sure').click(function(){
		var content=$('#recontent').val();  //回复的内容
		var id=$('#add_follow').attr("uid");  //发帖人ID
		var rid=$('#rid').text();    //主题的ID 
		if(content==''){
			alert("请输入内容");
			return false;
		}
		$.post('/home/act/replay',{uid:id,content:content,rid:rid,pid:pid,reuid:reuid},function(data){
			alert(data.msg);
			if(data.status==1){
				$('#recontent').val('');
				$('#mode').hide();
				window.location.href=window.location.href;
			}
			if(data.status==-2){
				window.location.href="/home/user/login";
			}
		},'json')
	});
	$('#collect').click(function(){
		if($(this).text()=='已收藏'){
			alert('已经收藏该评论');
			return false;
		}
		var rid=$('#rid').text();    //主题的ID 
		$.post('/home/act/collect',{rid:rid},function(data){
			alert(data.msg);
		},'json')
	});

	// $('.imgInfo').click(function(){
	// 	if(document.getElementById("imgInfo").style.display=="none"){ 
	// 		nowImg=$(this);
	// 		var screenHeight=window.screen.height;
	// 		var screenWidth=window.screen.width;
	// 		// var path=$(this).attr("src");
	// 		var path=$(this).attr("src").split("/");
	// 		path[path.length-1]=path[path.length-1].substr(7);
	// 		var imgPath='';
	// 		for(var i=1;i<path.length;i++){
	// 			imgPath += "/"+path[i];
	// 		}
	// 		/*计算图片位置*/
	// 		var img = new Image();
	// 		img.src=imgPath;
	// 		document.getElementsByTagName('meta')[1].content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0";
	// 		$('#imgInfo').fadeIn(1000);
	// 		$('#imgInfo').prevAll().each(function(){$(this).hide()});
	// 		// $('body').css({"overflow":"scroll","overflow-y":"hidden"});
	// 		$('#imgInfo').html("<div style='width:"+screenWidth+"px;height:"+screenHeight+"px;display:table-cell;text-align:center;vertical-align:middle;overflow:hidden'><img src='"+imgPath+"' style='max-width:"+screenWidth+"px' ></div>");
	// 	}
	// 	// alert(marginTop);
	// });


	$('#reply').focus(function(){
		$('#public_foot').hide();
		$('#public_close').hide();
	});
	$('#recontent').focus(function(){
		$('#public_foot').hide();
		$('#public_close').hide();
	});
	$('#reply').blur(function(){
		$('#public_foot').show();
		$('#public_close').show();
	});
	// var screenHeight=document.body.clientHeight;
	// if(screenHeight!=document.body.clientHeight){
	// 	$('#reply').toggle();
	// }

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


<!-- <span style="position:absolute;left:70px">昵称：<?php echo ($list["wangping"]["name"]); ?></span><br>
		<span style="margin-left:60px;">关注：<?php echo ($list["wangping"]["follow_count"]); ?></span>
		<span style="margin-left:20px;">被关注：<?php echo ($list["wangping"]["fans_count"]); ?></span> -->