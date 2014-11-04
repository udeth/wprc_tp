$(document).ready(function(){
	var seach_type=new Object;
	seach_type.type=0;

	$('.head_search_select').change(function(){
		if($(this).val()==0){
			seach_type.type=0;
		}else{
			seach_type.type=1;
		}
	});
});

