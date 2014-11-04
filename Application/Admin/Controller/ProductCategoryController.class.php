<?php
	
	// 网评的产品类别
class ProductCategoryController extends AdminController{
	
		// 类别列表
    public function index(){
			// 获取数据
		$list = D('product_category')->readList(I('name'));
		$this->assign( '_list', $list );
		$this->meta_title = '类别管理';
		$this->display();
    }
		
		// 添加类别
	public function add(){
		if( IS_POST ){
			$m = D('product_category');
			if( $m->create() ){
				if( $m->add() )
					$this->success('商品类别添加成功！',U('index'));
				else
					$this->error('添加商品失败！');
			}else{
				$this->error( $m->getError() );
			}
		}else{
			$cats = D('product_category')->readTree();
			$this->assign('cats', $cats);
			$this->meta_title = '添加类别';
			$this->display();
		}	
	}
	
		// 修改产品
	public function edit(){
		if( IS_POST ){
			$m = D('product_category');
			if( $m->create() ){
				$m->save();
				$this->success('商品类别修改成功！',U('index'));
			}else{
				$this->error( $m->getError() );
			}
		}else{
			if( !I('id') )
				$this->redirect('index');
				
				// 读取数据
			$data = M('product_category')->find( I('id') );
			$this->assign( 'data', $data );
				// 读取类别树
			$cats = D('product_category')->readTree();
			$this->assign('cats', $cats);
			$this->meta_title = '修改类别';
			$this->display();
		}
	}
	
		// 删除产品
	public function delete(){
		$id = I('id');
		if( !$id ){
			$this->redirect('index');
			return;
		}
		$map['id'] = array( 'in', $id );
		if( M('product_category')->where($map)->delete() )
			$this->success('商品类别删除成功！');
		else
			$this->error('商品类别删除失败！');
	}
}
