<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	<title>搜索网评</title>
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
	
	
	<div class="base_right mtop30" style="border:solid 1px #DBDBDB">
		<div class="fabu_index_left" style="padding:10px;">
			<p class="mbottom ft18">搜索</p>
			<input placeholder="请输入产品名/网址/实体店名" type="text" id="content" class="search_input" value="<?php echo ($kword); ?>">
			<img id="search" src="/Public/static/img/search.jpg" style="vertical-align: middle;height:40px;">
			<p class="mbottom"></p>
			<input type="checkbox" style="" id="wangzhi" value="wangzhi" <?php if($wangzhi){ echo 'checked';} ?>>&nbsp;&nbsp;搜网址&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="shiti" value="shiti" <?php if($shiti){ echo 'checked';} ?>>&nbsp;&nbsp;搜实体店
			<p class="mbottom"></p>
			<p class="ft18">
				所在地：
				<select id="s_province" name="s_province"></select>&nbsp;-&nbsp;
		        <select id="s_city" name="s_city" ></select>&nbsp;-&nbsp;
		        <select id="s_county" name="s_county"></select>
		        
		        <script type="text/javascript">_init_area();</script>
			</p>
			<p class="mbottom"></p>
			<p class="mbottom ft18">搜索结果>></p>
		</div>
		<div class="fabu_index_right">
			<img src="/Public/static/img/web_logo_big.jpg" style="width:225px" class="mtop15">
		</div>
		<div style="clear:both"></div>
		<div id="home_index_bottom" style="margin:0 10px 10px 10px">
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div class="home_index_list">
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

	<script type="text/javascript">
		if("<?php echo ($province); ?>"){
			$('#s_province').append("<option value='<?php echo ($province); ?>' selected><?php echo ($province); ?></option>")
		}
		if("<?php echo ($city); ?>"){
			$('#s_city').append("<option value='<?php echo ($city); ?>' selected><?php echo ($city); ?></option>")
		}
		if("<?php echo ($county); ?>"){
			$('#s_county').append("<option value='<?php echo ($county); ?>' selected><?php echo ($county); ?></option>")
		}
		var url="/home/index/search?"
		//执行搜索操作
		$('#search').click(function(){
			if($('#shiti').prop("checked")){
				url+="shiti=1&";
			}
			if($('#wangzhi').prop("checked")){
				url+="wangzhi=1&";
			}
			if($('#s_province').val()!="省份"){
				url+="province="+$('#s_province').val()+"&";
			}
			if($('#s_city').val()!="地级市"){
				url+="city="+$('#s_city').val()+"&";
			}
			if($('#s_county').val()!="市、县级市"){
				url+="county="+$('#s_county').val()+"&";
			}
			url+="kword="+$('#content').val()+'&';
			// alert(url);
			window.location.href=url;
		});
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