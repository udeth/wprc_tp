/**
 *common.js   web版界面公共js文件
 *@author
 *@default-charset utf-8
 */

//页面加载后执行
$(document).ready(function(){
	//首页tab切换
	$('#home_index_top').children('p').click(function(){
		$('#home_index_top').children('p').each(function(){
			$(this).removeClass('home_index_tab_on');
			$(this).removeClass('home_index_tab');
			$(this).addClass('home_index_tab');
		});
		$(this).removeClass('home_index_tab');
		$(this).addClass('home_index_tab_on');
		if($(this).text()=='热点差评'){
			$('#home_index_hotlist').show();
			$('#home_index_newlist').hide();
		}else{
			$('#home_index_hotlist').hide();
			$('#home_index_newlist').show();
		}
	});


	//发布页面tab切换
	if($('#fabu_top').children('p').length<3){
		$('#fabu_top').children('p').click(function(){
			$('#fabu_top').children('p').each(function(){
				$(this).removeClass('home_index_tab_on');
				$(this).removeClass('home_index_tab');
				$(this).addClass('home_index_tab');
			});
			$(this).removeClass('home_index_tab');
			$(this).addClass('home_index_tab_on');
			if($(this).text()=='发布实体店差评'){
				$('#home_index_hotlist').show();
				$('#isshiti').show();
				$('#home_index_newlist').hide();
				$('#tit').attr("placeholder","请输入地址");
				$("input[name=store_type]").val("1");
			}else{
				$('#home_index_hotlist').hide();
				$('#isshiti').hide();
				$('#home_index_newlist').show();
				$('#tit').attr("placeholder","请输入网址");
				$("input[name=store_type]").val("0");
			}
		});
	}

	

	//添加图片
	$('#addImg').on('click',function(){
		if($(this).parent().prev().children('input').val()==''){
			alert("请先选择前一张图片");
			return false;
		}
		$('#befor').before("<li>商品图片&nbsp;<span style='color:red'></span><input onclick='as();' type='file' name='aaa2[]' multiple='multiple' accept='image/*' class='houseMaps' ><img src='/Public/static/img/addImg.gif' class='onhouseMaps'></li>");
	});


});

// 显示图片在发布界面
	function as(){
		$('.houseMaps').on('change',function(){
		    var objUrl = getObjectURL(this.files[0]) ;
		    console.log("objUrl = "+objUrl) ;
		    if (objUrl) {
		        $(this).next().attr("src", objUrl) ;
		    }
		});
	}

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
