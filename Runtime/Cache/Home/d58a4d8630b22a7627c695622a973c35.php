<?php if (!defined('THINK_PATH')) exit();?><div>
<form method="post" action="/home/user/changeInfo" enctype="multipart/form-data" id="change">
	<table>
		<tr>
			<td class="form_left" style="height:120px;text-align:center;position:relative">
				<img src="/<?php if(empty($data['userInfo']['image'])){echo 'Public/static/img/default_big.jpg';}else{echo 'Uploads/Picture/User/'.$data['userInfo']['image'];} ?>" style="height:70px;width:80px;"><br>
				<input id="touxiang" type="file" onclick="changeImg()" style="opacity:0;width:60px;position:absolute;top:85px;width:80px;left:0px;" name="img">
				<button style="margin-top:10px;">更换头像</button> 
			</td>
			<td class="form_right" style="height:90px;">
				<p>
					<input type="text" name="name" value="<?php echo ($data["userInfo"]["name"]); ?>" style="height:30px;line-height:30px;width:160px;">&nbsp;&nbsp;&nbsp;
					<img src="/Public/static/img/<?php if($data['userInfo']['sex']){echo 'sex_nan.jpg';}else{echo 'sex_nv.jpg';}?>">
				</p>
				<p>关注（<?php echo ($data["userInfo"]["follow_count"]); ?>）&nbsp;&nbsp;&nbsp;&nbsp;被关注（<?php echo ($data["userInfo"]["fans_count"]); ?>）</p>
			</td>
		</tr>
		<tr>
			<td class="form_left">基本信息</td>
		</tr>
		<tr>
			<td class="form_left">
				所在地
			</td>
			<td class="form_right">
				<select id="s_province" name="s_province"></select>&nbsp;-&nbsp;
	        	<select id="s_city" name="s_city" ></select>&nbsp;-&nbsp;
	        	<select id="s_county" name="s_county"></select>
	        	<script type="text/javascript">
	        		_init_area();
	        		if("<?php echo ($data["userInfo"]["province"]); ?>"){
	        			$('#s_province').append("<option selected value='<?php echo ($data["userInfo"]["province"]); ?>'><?php echo ($data["userInfo"]["province"]); ?></option>");
	        		}
	        		if("<?php echo ($data["userInfo"]["city"]); ?>"){
	        			$('#s_city').append("<option selected value='<?php echo ($data["userInfo"]["city"]); ?>'><?php echo ($data["userInfo"]["city"]); ?></option>");
	        		}
	        		if("<?php echo ($data["userInfo"]["district"]); ?>"){
	        			$('#s_county').append("<option selected value='<?php echo ($data["userInfo"]["district"]); ?>'><?php echo ($data["userInfo"]["district"]); ?></option>");
	        		}	
	        	</script>
			</td>
		</tr>
		<tr>
			<td class="form_left">
				生日
			</td>
			<td class="form_right">
				<select id="year" name="year"></select>
				<select id="month" name="month"></select>
				<select id="day" name="day"></select>
				<script type="text/javascript">
					var yearStr='';
					var monthStr='';
					var dayStr='';
					for(var k=1900;k<2014;k++){
						yearStr += "<option value='"+k+"'>"+k+"年</option>";
					}
					for(var i=1;i<13;i++){
						monthStr += "<option value='"+i+"'>"+i+"月</option>";
					}
					for(var j=1;j<32;j++){
						dayStr += "<option value='"+j+"'>"+j+"日</option>";
					}
					$('#year').append(yearStr);
					$('#month').append(monthStr);
					$('#day').append(dayStr);
					if("<?php echo ($data["userInfo"]["birthday"]); ?>"!="0000-00-00 00:00:00"){
						$('#year').append("<option selected value='"+<?php echo (substr($data["userInfo"]["birthday"],0,4)); ?>+"'>"+<?php echo (substr($data["userInfo"]["birthday"],0,4)); ?>+"年</option");
						$('#month').append("<option selected value='"+<?php echo (substr($data["userInfo"]["birthday"],5,2)); ?>+"'>"+<?php echo (substr($data["userInfo"]["birthday"],5,2)); ?>+"月</option");
						$('#day').append("<option selected value='"+<?php echo (substr($data["userInfo"]["birthday"],8,2)); ?>+"'>"+<?php echo (substr($data["userInfo"]["birthday"],8,2)); ?>+"日</option");
					}
				</script>
			</td>
		</tr>
		<tr>
			<td class="form_left">
				QQ号码
			</td>
			<td class="form_right">
				<input type="text" name="QQ" value="<?php if(!empty($data['userInfo']['QQ'])){echo $data['userInfo']['QQ'];}else{ echo '';} ?>" style="height:30px;line-height:30px;width:350px;">
			</td>
		</tr>
		<tr>
			<td class="form_left">
				积分
			</td>
			<td class="form_right">
				<?php echo ($data["userInfo"]["score"]); ?>
			</td>
		</tr>
		<tr>
			<td class="form_left">
				手机号码
			</td>
			<td class="form_right">
				<input type="text" name="mobile" value="<?php echo ($data["userInfo"]["mobile"]); ?>" style="height:30px;line-height:30px;width:350px;">
			</td>
		</tr>
	</table>
	<p style="text-align:right;"><span onclick="tijiao();" id="">修改</span></p>
</form>
	<script type="text/javascript">
		function changeImg(){
			$('#touxiang').on('change',function(){
			    var objUrl = getObjectURL(this.files[0]) ;
			    console.log("objUrl = "+objUrl) ;
			    if (objUrl) {
			        $(this).prev().prev().attr("src", objUrl) ;
			    }
			});
		}
		function tijiao(){
			function check(){
				if($("input[name='name']").val()==''){
					alert('请输入昵称');
					return false;
				}
				if($('#s_province').val()=='省份' || $('#s_city').val()=='地级市' || $('#s_county').val()=='市、县级市'){
					alert('请输入正确的地区');
					return false;
				}
				return true;
			}
			if(check()){
				$('#change').submit();
			}
		}
	</script>
</div>