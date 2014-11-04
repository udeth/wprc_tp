<?php

function ary_to_str($ary, $split=','){
	$str = '';
	foreach( $ary as $a ){
		if( $str != '' )
			$str .= $split;
		$str .= $a;
	}
	return $str;
}

function my_upload_name(){
	return time().'_'.mt_rand();
}
