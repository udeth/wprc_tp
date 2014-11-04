<?php

use Think\Model;

	// 产品类别模型
class ReviewModel extends Model {
		
		// 自动验证
	protected $_validate = array(
	);
	
		// 读取列表信息，参数为搜索信息
	public function readList( $name='' ){
			// 字段信息
		$fieldStr = 'r.id id, u.name user_name, r.product_name product_name, pc.name product_category_name';
		$fieldStr .= ', r.store_name store_name, r.address address'; 
		$fieldStr .= ', r.checked checked, FROM_UNIXTIME( r.time ) time';
		
			// 查询条件
		$map = array();
		if($name){
			$map['u.name'] = array( 'like', "%$name%" );
			$map['r.product_name'] = array( 'like', "%$name%" );
			$map['r.address'] = array( 'like', "%$name%" );
			$map['r.store_name'] = array( 'like', "%$name%" );
			$map['_logic'] = 'OR';
		}
			
			// 返回结果
		return $this->alias( 'r' )->join( '__USER__ u on r.uid=u.id', 'left' )
					->join( '__PRODUCT_CATEGORY__ pc on r.product_category_id=pc.id', 'left' )
					->where($map)->order('r.checked, r.time desc')->field( $fieldStr )->select();
	}
		
		// 读取单个数据信息
	public function readItem($id){
			// 字段信息
		$fieldStr = 'r.id id, r.uid uid, u.name user_name, r.product_name product_name, pc.name product_category_name';
		$fieldStr .= ', r.store_name store_name, if(r.store_type=0, "网店", "实体店") store_type'; 
		$fieldStr .= ', r.address address, r.province province, r.city city, r.district district';
		$fieldStr .= ', r.checked checked, FROM_UNIXTIME( r.time ) time';
		$fieldStr .= ', r.hot hot, r.comment_count comment_count';
		$fieldStr .= ', r.content content, r.image image, if(r.checked=0,"未审核","已审核") checkedtext';

			// 返回结果
		return $this->alias( 'r' )->join( '__USER__ u on r.uid=u.id', 'left' )
					->join( '__PRODUCT_CATEGORY__ pc on r.product_category_id=pc.id', 'left' )
					->field( $fieldStr )->where( 'r.id=' . $id )->find();
	}


	/**
	 *取得网评的统计数据
	 *@param
	 *@return result array 
	 */
	public function getCount(){

		$sql="SELECT count(*) as num,checked FROM `think_review` GROUP BY checked ORDER BY checked desc ";
		$result=M()->query($sql);
		return $result;
	}
}