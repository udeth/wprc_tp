<?php if (!defined('THINK_PATH')) exit();?><div id="changeinfo">
	<div style="">
		<img src="<?php if(empty($data['userInfo']['image'])){echo '/Public/static/img/default_big.jpg';}else{echo '/Uploads/Picture/User/'.$data['userInfo']['image'];} ?>" style="display:block;float:left;width:70px;height:70px">
		<div style="min-width:200px;float:left">
			<p class="user_index_info" style="margin-top:0">
				<span><?php echo ($data["userInfo"]["name"]); ?></span>
				<span style="margin-left:10px;">
					<img src="<?php if($data['userInfo']['sex']==1){ echo "/Public/static/img/sex_nan.jpg";}else{echo "/Public/static/img/sex_nv.jpg";} ?>" />
				</span><br>
				<span style="margin-left:0;color:#9A9A9A;font-size:12px;"><?php echo ($data["userInfo"]["province"]); echo ($data["userInfo"]["city"]); echo ($data["userInfo"]["district"]); ?></span>
			</p>
			<p class="user_index_info" style="margin-top:0"><span>积分：<?php echo ($data["userInfo"]["score"]); ?></span></p>
			
			<div style="clear:both"></div>
			
		</div>
		<div>
			
		</div>
		<div style="clear:both"></div>
		<div>
			<a href="messageBox"><span>私信箱&nbsp;<span style="color:#9A9A9A">(<?php echo ($data["num"]); ?>)</span></span></a>
			<a href="/home/user/follow?type=1"><span style="margin-left:15%;">关注&nbsp;<span style="color:#9A9A9A">(<?php echo ($data["userInfo"]["follow_count"]); ?>)</span></span></a>
			<a href="/home/user/follow?type=0"><span style="margin-left:15%;">被关注&nbsp;<span style="color:#9A9A9A">(<?php echo ($data["userInfo"]["fans_count"]); ?>)</span></span></a>
		</div>
	</div>
	<div id="changeinfo_" style="text-align:right;width:100px;float:right;margin-top:15px;">编辑资料>></div>
	<div style="clear:both"></div>
	<!-- <div class="review_tab" style="margin:15px auto">
		<div class="review_tab_on">焦点差评</div>
		<div class="review_tab_off">最新差评</div>
	</div> -->

<!-- 	<div id="listmode_hot">
		<?php if(is_array($data["hotList"])): $i = 0; $__LIST__ = $data["hotList"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div>
				<p style="background:#DFDFDF;height:30px;line-height:30px;text-align:right;margin:10px auto;">
					<?php if($list['store_type']==1){echo "地址:".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo "网址:".$list['address'];} ?>
				</p>
				<p style="margin:10px auto;font-size:14px;">
					<span>产品名称:<?php echo ($list["product_name"]); ?></span>
					<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
				</p>
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,20,"utf-8")); ?>...<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a></p>
				<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>

	<div id="listmode_new" style="display:none">
		<?php if(is_array($data["newList"])): $i = 0; $__LIST__ = $data["newList"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><div>
				<p style="background:#DFDFDF;height:30px;line-height:30px;text-align:right;margin:10px auto;">
					<?php if($list['store_type']==1){echo "地址:".$list['province'].$list['city'].$list['district'].$list['address'];}else{echo "网址:".$list['address'];} ?>
				</p>
				<p style="margin:10px auto;font-size:14px;">
					<span>产品名称:<?php echo ($list["product_name"]); ?></span>
					<span style="margin-left:20%">产品类别:<?php echo ($list["name"]); ?></span>
				</p>
				<p style="margin:10px auto;color:#777777"><?php echo (mb_substr($list["content"],0,20,"utf-8")); ?>...<a href="/home/act/reviewInfo?id=<?php echo ($list["id"]); ?>" style="color:red">详情>></a></p>
				<p style="margin:10px auto;font-size:14px;">发布时间:<?php echo (date("Y-m-d",$list["time"])); ?></p>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div id="more" style="text-align:center;">查看更多>></div> -->
</div> 
	
<div id="ischange" style="display:none">
<p>个人信息>编辑资料></p>
<form method="post" action="/home/user/changeInfo" enctype="multipart/form-data" id="change">
	<div style="">
		<img src="<?php if(empty($data['userInfo']['image'])){echo '/Public/static/img/default_big.jpg';}else{echo '/Uploads/Picture/User/'.$data['userInfo']['image'];} ?>" style="display:block;float:left;width:70px;height:70px">
		<p class="user_index_info" style="margin-left:0">请选择头像图片<br><input type="file" name="img" style="width:150px;"></p>
		<div style="clear:both"></div>
		<div style="width:100%;float:right">
			<p class="user_index_info" style="margin-left:0"><input type="text" name="name" value="<?php echo ($data["userInfo"]["name"]); ?>" placeholder="用户昵称" style="width:96%;height:30px"></p>
			<p class="user_index_info" style="margin-left:0">
				<span>性&nbsp;&nbsp;&nbsp;别:
					<input style="margin-left:10%" type="radio" <?php if($data['userInfo']['sex']==1){echo "checked";} ?> name="sex" value="1">男&nbsp;&nbsp;<img src="/Public/static/img/sex_nan.jpg">
					<input style="margin-left:10%" type="radio" <?php if($data['user']['sex']==0){echo "checked";} ?> name="sex" value="0">女&nbsp;&nbsp;<img src="/Public/static/img/sex_nv.jpg">
				</span>
			</p>
			<p class="user_index_info" style="margin-left:0">
				生日
				<select id="year" name="year" style="width:80px;">
					<?php if(substr($data['userInfo']['birthday'],0,4)!='0000'){ ?><option value="<?php echo (substr($data["userInfo"]["birthday"],0,4)); ?>"><?php echo (substr($data["userInfo"]["birthday"],0,4)); ?>年</option><?php } ?>
				</select>
				<select id="month" name="month" style="width:80px;">
					<?php if(substr($data['userInfo']['birthday'],5,2)!='00'){ ?><option value="<?php echo (substr($data["userInfo"]["birthday"],5,2)); ?>"><?php echo (substr($data["userInfo"]["birthday"],5,2)); ?>月</option><?php } ?>
				</select>
				<select id="day" name="day" style="width:80px;">
					<?php if(substr($data['userInfo']['birthday'],8,2)!='00'){ ?><option value="<?php echo (substr($data["userInfo"]["birthday"],8,2)); ?>"><?php echo (substr($data["userInfo"]["birthday"],8,2)); ?>日</option><?php } ?>
				</select>
				<script type="text/javascript">
					var yearStr="";
					var monthStr="";
					var dayStr="";
					for(var i=2014;i>1900;i--){
						yearStr += "<option value='"+i+"'>"+i+"年</option>"
					}
					for(var i=12;i>0;i--){
						monthStr += "<option value='"+i+"'>"+i+"月</option>"
					}
					for(var i=31;i>0;i--){
						dayStr += "<option value='"+i+"'>"+i+"日</option>"
					}
					$('#year').append(yearStr);
					$('#month').append(monthStr);
					$('#day').append(dayStr);
				</script>
			</p>
			<p class="user_index_info" style="margin-left:0">
				<input type="text" name="QQ" value="<?php if(!$data['userInfo']['QQ']){echo '';}else{echo $data['userInfo']['QQ'];} ?>" placeholder="请填写您的QQ" style="width:96%;height:30px">
			</p>
			<!-- <p class="user_index_info" style="margin-left:0"><span>所在城市：<?php echo ($data["userInfo"]["province"]); echo ($data["userInfo"]["district"]); ?></span> -->
				<div id="area" style="overflow:hidden">
				<span style="display:block;float:left;font-size:16px;">所在地:</span>
				<div>
	        <select id="s_province" name="s_province"></select>&nbsp;&nbsp;
	        <select id="s_city" name="s_city" ></select>&nbsp;&nbsp;
	        <select id="s_county" name="s_county"></select>
	        
	        <script type="text/javascript">_init_area();</script>
	        </div>
	        <div id="show"></div>
	    </div><br><br>
		        
    		</div>
			
			<!-- <p class="user_index_info" style="margin-left:0"><span>关注:<a href="/home/user/follow?type=1" style="text-decoration:underline"><?php echo ($data["userInfo"]["follow_count"]); ?></a></span> -->
			<!-- <span style="margin-left:15%;">被关注:<a href="/home/user/follow?type=0" style="text-decoration:underline"><?php echo ($data["userInfo"]["fans_count"]); ?></a></span></p> -->
			

			<div style="clear:both"></div>
			
		</div>
			<!-- <p style="margin-top:20px;"><span style="vertical-align: middle;">签名:</span></p> -->
			<p><textarea placeholder="一句话介绍自己" name="intro" style="vertical-align: middle;width:100%;height:60px;"><?php echo ($data["userInfo"]["introduction"]); ?></textarea></p>
			<div style="text-align:center;margin:20px 0;"><input onclick="tijiao();" style="width:98%;height:60px;text-align:center;line-height:60px;background:#F95D20;border:0;color:white;font-size:18px" value="确认修改"></div>
	</div>
</form>
</div>

<a href="/home/ScoreShop/index" style="display:block;width:100%;margin:20px auto;border-radius:3px;line-height:50px;text-align:center;font-size:20px;height:50px;background:#FF3709;color:white">积分商城</a>
<a href="javascript:logOut();" style="display:block;width:100%;margin:0 auto;border-radius:3px;line-height:50px;text-align:center;font-size:20px;height:50px;background:#C7060B;color:white">退出登录</a>

<script type="text/javascript">
	// setup();
		//参数初始化
	var istype="hot";
	var coun_hot=2;
	var coun_new=2;
	var hotclick=1;
	var newclick=1;
	//tab切换
	$('.review_tab div').click(function(){
		$('.review_tab div').each(function(){
			$(this).removeClass("review_tab_on");
			$(this).addClass("review_tab_off");
		});
		$(this).addClass("review_tab_on");
		$(this).removeClass("review_tab_off");
		if($(this).text()=="焦点差评"){
			$('#listmode_hot').show();
			$('#listmode_new').hide();
			istype="hot";
		}else{
			$('#listmode_hot').hide();
			$('#listmode_new').show();
			istype="new";
		}
	});
	//列表加载事件
	$('#more').click(function(){
		if($('#listmode_hot').css("display")=='none'){
			coun=coun_new;
			if(newclick!=1){
				return false;
			}
		}else{
			coun=coun_hot;
			if(hotclick!=1){
				return false;
			}
		}
		$.post('/Home/Index/getListMore',{coun:coun,istype:istype,listcount:3},function(data){
			if(data.status==1){
				if(istype=="new"){
					coun_new++;
					$('#listmode_new').append(data.html);
				}else{
					coun_hot++;
					$('#listmode_hot').append(data.html);
				}
			}else{
				if(istype=="new"){
					$('#listmode_new').append("<div style='text-align:center'>暂无数据</div>");
					newclick=0;
				}else{
					$('#listmode_hot').append("<div style='text-align:center'>暂无数据</div>");
					hotclick=0;
				}
			}
		},'json');
	});

	//个人资料编辑
	$('#changeinfo_').click(function(){

		$('#changeinfo').hide();
		$('#ischange').show();

	});

	if("<?php echo $data['userInfo']['province']; ?>"!=''){
		$('#s_province').append("<option value='<?php echo ($data["userInfo"]["province"]); ?>' selected><?php echo ($data["userInfo"]["province"]); ?></option>");
	}
	if("<?php echo $data['userInfo']['city']; ?>"!=''){
		$('#s_city').append("<option value='<?php echo ($data["userInfo"]["city"]); ?>' selected><?php echo ($data["userInfo"]["city"]); ?></option>");
	}
	if("<?php echo $data['userInfo']['district']; ?>"!=''){
		$('#s_county').append("<option value='<?php echo ($data["userInfo"]["district"]); ?>' selected><?php echo ($data["userInfo"]["district"]); ?></option>");
	}

	function logOut(){
		$.post("/home/user/logOut",{},function(data){
			if(data.status==1){
				alert("成功退出");
				window.location.href="/home/index/";
			}
		},'json');
	}

	function tijiao(){
		if($("input[name='name']").val()==''){
			alert('请输入昵称');
			return false;
		}
		if($('#s_province').val()=='省份' || $('#s_city').val()=='地级市' || $('#s_county').val()=='市、县级市'){
			alert('请输入正确的地区');
			return false;
		}
		$('#change').submit();
	}
</script>