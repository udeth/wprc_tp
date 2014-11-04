<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>网评如潮</title>
<link rel="stylesheet" type="text/css" href="/Public/static/css/web_style.css">
<script type="text/javascript" src="/Public/static/js/jquery.js"></script>
<script type="text/javascript" src="/Public/static/js/web_common.js"></script>
<script type="text/javascript" src="/Public/static/js/pccs.js"></script>
</head>
<body>
	
		<div class="base_left">
			<div class="base_left_top">
				<?php if($isLogin){ ?>
					<div style="width:98%;height:200px;margin:30px auto;margin-bottom:10px;border:solid 1px #C7C6C7;box-shadow:1px 1px 1px #C7C6C7">
						<div style="">
							<img src="<?php if(!empty($conmon_user[0]['image'])){ echo '/Uploads/Picture/User/'.$conmon_user[0]['image']; }else{ echo '/Public/static/img/default_big.jpg'; } ?>" style="width:140px;height:140px;margin:10px;display:block">
						</div>
						<div>
							<ul>
								<a href="/home/user/userIntro"><li class="base_user">
									发布<br>
									<?php echo ($fabu_num); ?>
								</li></a>
								<a href="/home/user/follow?type=1"><li class="base_user">
									关注<br>
									<?php echo ($conmon_user["0"]["follow_count"]); ?>
								</li></a>
								<a href="/home/user/follow"><li class="base_user">
									粉丝<br>
									<?php echo ($conmon_user["0"]["fans_count"]); ?>
								</li></a>
							</ul>
						</div>
					</div>
					<p style="text-align:center">
						<?php echo ($conmon_user["0"]["account"]); ?>
					</p>
				<?php }else{ ?>
					<div style="width:100%;height:100%;position:relative">
						<p style="position:absolute;top:100px;left:10px;color:white;text-align:center">
							<a href="javascript:base_login();">登陆</a>
						</p>
						<p style="position:absolute;top:140px;left:10px;color:white;text-align:center">
							<a href="/home/user/insert">注册</a>
						</p>
					</div>
				<?php } ?>
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
		
		</div>
		<div id="fabu_bottom">
			<div style="padding:10px">
					<a href="/home/user/userIntro?uid=<?php echo ($list["wangping"]["uid"]); ?>"><span style="color:red;font-size:20px;"><?php echo ($list["wangping"]["name"]); ?></span></a><br>
					<span style="color:#898788;font-size:14px;margin-top:5px;"><?php echo (date("Y-m-d",$list["wangping"]["time"])); ?></span>
					<button id="add_follow" uid="<?php echo ($list["wangping"]["uid"]); ?>" style="display:block;float:right;margin-top:-15px;border:0;font-size:16px;background:#C7060B;height:30px;width:70px;color:white;border-radius:3px;"><?php if($guanzhu==0){ ?>+关注<?php }else{ ?>取消关注<?php } ?></button>
				<div style="border:solid 1px #E9E7E7;padding:10px">
				
				<p style="font-size:20px;"><?php if($list['wangping'][0]['type']==1){ echo ($list["wangping"]["store_name"]); ?>&nbsp;<?php echo ($list["wangping"]["province"]); ?>&nbsp;<?php echo ($list["wangping"]["city"]); ?>&nbsp;

			<?php echo ($list["wangping"]["0"]["district"]); ?>&nbsp;<?php }else{ echo ($list["wangping"]["address"]); } ?></p>
				<div>
					<p style="text-indent:2em"><?php echo ($list["wangping"]["content"]); ?></p>
				</div>
				<!-- <p style="margin-bottom:15px">发布时间：<?php echo (date("Y-m-d",$list["wangping"]["time"])); ?>&nbsp;&nbsp;&nbsp;&nbsp;评论数：<?php echo ($list["wangping"]["comment_count"]); ?></p> -->
				
				<div>
					<?php if(is_array($list["wangping"]["imgArr"])): $i = 0; $__LIST__ = $list["wangping"]["imgArr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><img class="imgInfo" src="/<?php echo ($arr); ?>" style="width:30%;">&nbsp;&nbsp;<?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
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
							<a href="/home/user/userIntro?uid=<?php echo ($row["uid"]); ?>"><span style="display:block;width:40%;color:red"><?php echo ($row["name"]); ?>:</span></a>
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
								<span style="color:red">
									<a href="/home/userIntro?uid=<?php echo ($inrow["uid"]); ?>"><?php echo ($inrow["name"]); ?>&nbsp;&nbsp;</a>
									<span style="color:black">回复</span>&nbsp;&nbsp;<?php echo ($inrow["rename"]); ?>
								</span>：&nbsp;
								<span><?php echo ($inrow["content"]); ?></span>
								<div style="clear:both"></div>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			<div id="rid" style="display:none"><?php echo ($id); ?></div>
			<div style="text-align:center;margin-bottom:15px"><?php echo ($page); ?></div>


			<!-- 图片查看层 -->
			<div id="ass" style="z-index:9999999;position:fixed;width:100%;height:100%;overflow:hidden;display:none;background:#272822;top:0;left:0">
			<div id="imgInfo" style="width:100%;">
				<?php if(is_array($list["wangping"]["bigImgArr"])): $i = 0; $__LIST__ = $list["wangping"]["bigImgArr"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$arr): $mod = ($i % 2 );++$i;?><div class="cl1">
						<img src="/<?php echo ($arr); ?>" style="width:98%">
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
			</div>
			<!-- 模态框 -->
			<div id="mode" style="display:none;width:100%;margin:0 auto;height:100%;position:fixed;top:0;left:0;background:rgba(0,0,0,0.5);z-index:9999">
				<div id="in_mode" style="width:750px;height:200px;background:white;position:fixed;">
					<textarea id="recontent" style="width:90%;height:100px;margin:20 auto;display:block"></textarea>
					<div style="text-align:center"><button id="sure">确认</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="quxiao">取消</button></div>
				</div>
			</div>
		</div>
	</div>
<script type="text/javascript">
	document.getElementById('in_mode').style.left=(document.documentElement.clientWidth-750)/2+'px';
	document.getElementById('in_mode').style.top=(document.documentElement.clientHeight-600)/2+'px';
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
	// $('.imgInfo').click(function(){
	// 	// var imgSrc=$(this).attr('src');
	// 	var path=$(this).attr("src").split("/");
	// 	path[path.length-1]=path[path.length-1].substr(7);
	// 	var imgSrc='';
	// 	for(var i=1;i<path.length;i++){
	// 		imgSrc += "/"+path[i];
	// 	}
	// 	$('.cl1').each(function(){
	// 		if($(this).children().attr('src')==imgSrc){
	// 			nowImg = $(this);
	// 		}
	// 	})
	// 	var page=nowImg.prevAll().length;//alert(page);
	// 	$('#imgInfo').css({'marginLeft':-page*screenWidth+'px'});
	// 	$('#ass').prevAll().each(function(){$(this).hide()});
	// 	$('#ass').fadeIn(300);
	// });
	
	
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

	// $('#ass').click(function(){
	// 	$('#ass').prevAll().each(function(){$(this).show();});$(this).fadeOut(300);
	// 	// $('body').css('overflow','auto');
	// 	// document.getElementsByTagName('meta')[1].content="minimum-scale=1.0, initial-scale=1.0, maximum-scale=1.0,user-scalable=no";
	// 	$('#rid').hide();
	// });


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

	<div id="base_login_mode" style="display:none;position:fixed;width:100%;height:100%;top:0;left:0;background:rgba(0,0,0,0.5)">
		<div id="base_login_main" style="width:400px;height:400px;border:solid 1px #D5D1D2;position:relative;background:white">
			<p style="height:40px;background:#F0ECEB;color:#CC4F53;line-height:40px;font-size:18px;">
				<img src="/Public/static/img/logo_small.jpg" style="vertical-align: middle;">
				登陆网评如潮
				<img src="/Public/static/img/base_xx.jpg" style="display:block;float:right;margin:15px;" id="base_login_close">
			</p>
				<div style="height:40px;width:300px;margin:0 auto;margin-top:50px;border:solid 1px #D5D1D2;">
					<img src="/Public/static/img/insert_user.gif" style="margin:12px 13px;">
					<input type="text" name="login_name" id="login_name" value="<?php if($name){echo $name;} ?>"  placeholder="请输入用户名(5-12位英文、数字组成)" style="top:91px;height:38px;border:0;position:absolute;width:257px;">
				</div>
				<div style="height:40px;border:solid 1px #D5D1D2;border-top:0;width:300px;margin:0 auto">
					<img src="/Public/static/img/lock.jpg" style="margin:10px 14px 18px 14px">
					<input type="password" name="login_password" id="login_password" value="" placeholder="请输入密码" style="top:132px;height:38px;border:0;position:absolute;width:257px;">
				</div>
				<p style="width:300px;margin:10px auto">
					<input type="checkbox" id="save" checked="" style="">保存密码
					<a href="/home/act/findUser" style="display:block;float:right;">忘记密码？</a>
				</p>
				<div id="login_doact" style="width:300px;height:60px;line-height:60px;margin:20px auto;background:#C7060B;text-align:center;border-radius:5px;font-size:30px;color:white;box-shadow:1px 1px 1px #838383">确认登陆</div>
				<!-- <p style="width:300px;margin:0 auto">可以使用以下方式登陆</p> -->
		</div>
	</div>
	<div id="base_insert_mode">
		
	</div>
<script type="text/javascript">
	document.getElementById('base_login_main').style.top=(document.body.clientHeight-400)/2+'px';
	document.getElementById('base_login_main').style.left=(document.body.clientWidth-400)/2+'px';
	$('#base_login_close').click(function(){
		$('#base_login_mode').hide();
	});
	// alert(document.body.clientHeight);
	function base_login(){
		$('#base_login_mode').show();
	}
	function base_insert(){

	}

	$('#login_doact').click(function(){
		var save;
		var login_name=$('#login_name').val();
		var login_password=$('#login_password').val();
		if($('#save').prop("checked")){
			save=1;
		}else{
			save=0;
		}
		if(login_name==''){
			alert("请填写用户名");
			return false;
		}
		if(login_password==''){
			alert('请输入密码');
		}
		$.post('/home/user/checkLogin',{'name':login_name,'password':login_password,'save':save},function(data){
			if(data.status==1){
				alert(data.msg);
				window.location.href="/home/act/index";
			}else{
				alert(data.msg);
			}
		},
		'json'
		);
	});
</script>
</body>
</html>