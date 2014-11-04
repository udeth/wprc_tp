<?php

use Think\Model;

	// 产品类别模型
class ProductCategoryModel extends Model {
		
		// 自动验证
	protected $_validate = array(
			// 类别名验证
		array('name','require','请填写类别名！'),
		array('name','','类别名称已经存在！',0,'unique',2),
			// 排序验证
		array('sort','number','排序的值为数字！'),
	);
	
		// 读取列表信息，参数为搜索信息
	public function readList( $name='' ){
			// 提取的字段
		$fieldStr = 'pc1.id id, pc1.name name, ifnull(pc2.name,"顶级菜单") pname, pc1.sort sort';
			
			// 过滤器
		$map = array();
		if($name){
			$map['pc1.name'] = array( 'like', '%'. $name . '%' );
		}	
			// 获取数据
		return $this->alias( 'pc1' )->join( '__PRODUCT_CATEGORY__ pc2 on pc1.pid=pc2.id', 'left' )
								    ->where( $map )->field( $fieldStr )->select();
	}
	
		// 读取类别树
	public function readTree($addRoot=true){
		$list = $this->field(true)->select();
		$list = D('Tree')->toFormatTree($list, 'name');
		if( $addRoot )
			$list = array_merge(array(0=>array('id'=>0,'title_show'=>'顶级类别')), $list);
		return $list;
	}
}