<?php

use Think\Model;

	// 评论模型
class ReplyModel extends Model {
		
		// 自动验证
	protected $_validate = array(
	);
	
		// 读取列表信息，参数为搜索信息
	public function readList( $name='' ){
			// 提取的字段
		$fieldAry = array(
			'r1.id' => 'id',
			'u.name' => 'user_name',
			'r1.pid' => 'pid',
			'r1.rid' => 'rid',
			'concat( substring(r1.content,1,10), "...")' => 'content',
			'concat( substring(r2.content,1,10), "...")' => 'pcontent',
			'concat( substring(review.content,1,10), "...")' => 'rcontent',
			'FROM_UNIXTIME( r1.time )' => 'time'
		);
			// 过滤器
		$map = array();
		if($name){
			$map['u.name'] = array( 'like', '%'. $name . '%' );
		}	
			// 获取数据
		return $this->alias( 'r1' )->join( '__USER__ u on r1.uid=u.id', 'left' )
					->join( '__REPLY__ r2 on r1.pid=r2.id', 'left' )
					->join( '__REVIEW__ review on r1.rid=review.id', 'left' )
					->where( $map )->field( $fieldAry )->select();
	}
	
		// 读取详情
	public function readItem($id){
		$fieldStr = 'u1.name user_name, r1.content content, FROM_UNIXTIME( r1.time ) time';
		$fieldStr .= ', u2.name puser_name, r2.content pcontent, FROM_UNIXTIME( r2.time ) ptime';
		$fieldStr .= ', u3.name ruser_name, review.content rcontent, FROM_UNIXTIME( review.time ) rtime';
		
		
		return $this->alias( 'r1' )->join( '__USER__ u1 on r1.uid=u1.id', 'left' )
					->join( '__REPLY__ r2 on r1.pid=r2.id', 'left' )
					->join( '__USER__ u2 on r2.uid=u2.id', 'left' )
					->join( '__REVIEW__ review on r1.rid=review.id', 'left' )
					->join( '__USER__ u3 on review.uid=u3.id', 'left' )
					->where( 'r1.id=' . $id )->field( $fieldStr )->find();
	}

}