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
		<div id="home_index_top">
			<img src="/Public/static/img/web_logo_small.jpg" class="img_float_right mtop30">
			<p class="home_index_tab_on">热点差评</p>
			<p class="home_index_tab">潮友动态</p>
		</div>
		<div id="home_index_bottom">
			<div id="home_index_hotlist">
				<?php if(is_array($listHot)): $i = 0; $__LIST__ = $listHot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="home_index_list">
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
			</div>
			<div id="home_index_newlist" style="display:none">
				<?php if(is_array($listNew)): $i = 0; $__LIST__ = $listNew;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="home_index_list">
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
			</div>
		</div>
		<div id="home_index_more">查看更多>></div>
	</div>
	<script type="text/javascript">
			//首页加载
	if($('#home_index_more').length>0){
		var hotpage=2;
		var hotclick=1;
		var newpage=2;
		var newclick=1;
		var page=0;
		var istype;
		$('#home_index_more').click(function(){
			if($('.home_index_tab_on').text()=='热点差评'){
				if(hotclick!=1){
					return false;
				}
				page=hotpage;
				getmore(page,'hotpage');
			}else{
				if(newclick!=1){
					return false;
				}
				page=newpage;
				getmore(page,'newpage');
			}
		});
		function getmore(page,pagetype){
			if(pagetype=='hotpage'){
				istype='hot';
			}else{
				istype='new';
			}
			$.post('/home/index/getListMore',{coun:page,istype:istype,listcount:5},function(data){
				if(data.status==1){
					if(istype=="new"){
						newpage++;
						$('#home_index_newlist').append(data.html);
					}else{
						hotpage++;
						$('#home_index_hotlist').append(data.html);
					}
				}else{
					if(istype=="new"){
						$('#home_index_newlist').append("<div style='text-align:center;margin-bottom:10px;'>暂无数据</div>");
						newclick=0;
					}else{
						$('#home_index_hotlist').append("<div style='text-align:center;margin-bottom:10px;'>暂无数据</div>");
						hotclick=0;
					}
				}
			},'json');
		}
	}

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
					<a href="/home/index/findUser" style="display:block;float:right;">忘记密码？</a>
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
				window.location.href="/home/index/index";
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