<?php
	
	// 评论控制器
class ReplyController extends AdminController {

		// 评论列表
    public function index(){
		$list = D('Reply')->readList(I('name'));
		$this->assign('_list', $list);
        $this->display();
    }
	
		// 评论详情
	public function detail(){
		$id = I('id');
		if( !$id ){	// 误操作
			$this->redirect('index');
			return;
		}
		
			// 读取评论详情
		$data = D('Reply')->readItem($id);
		$this->assign('data', $data);
        $this->display();
	}
	
		// 新增
	public function add(){
		if( IS_POST ){
			$_POST['time'] = time();
			$m = D('Reply');
			if( $m->create() ){
				if( $m->add() ){
					$this->success( '评论添加成功！', U('index') );
				}else{
					$this->error( '评论添加失败！' );
				}
			}else{
				$this->error( $m->getError() );
			}
		}else{
			$this->display();
		}
	}
	
		// 删除
	public function delete(){
		$id = I('id');
		if( !$id ){
			$this->redirect('index');
			return;
		}
		$map['id'] = array( 'in', $id );
		if( M('Reply')->where($map)->delete() )
			$this->success('评论删除成功！');
		else
			$this->error('评论删除失败！');
	}

}
