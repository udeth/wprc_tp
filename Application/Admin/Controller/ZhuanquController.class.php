<?php

class ZhuanquController extends AdminController{
	
	public function index(){
		$zhuanqu = D('Zhuanqu')->order('sort asc')->select();
		$this->assign('zhuanqu',$zhuanqu);
		$this->meta_title = '专区列表';
		$this->display();
	}


	public function delete(){
		$id = array_unique((array)I('id'));
		$id = is_array($id) ? implode(',',$id) : $id;
		if(empty($id)){
			$this->error('请选择要删除的数据！');
		}
		$map['zhuanqu_id'] = array('in',$id);
		if($Score = D('ScoreShop')->where($map)->count()){
			$this->error('该专区下存在商品，不能直接删除！');
		}else{
			if(D('Zhuanqu')->where($map)->delete()){
				$this->success('删除成功');
			}
		}
	}

	public function add(){
		if(IS_POST){
			$zhuanqu = D('Zhuanqu');
			if($zhuanqu->where(array('zhuanqu_name' => $_POST['zhuanqu_name']))->count()){
				$this->error('该专区已经存在！');eixt;
			}
			if($zhuanqu->create()){
				if($zhuanqu->add()){
					$this->success('添加专区成功！');
				}else{
					$this->error($zhuanqu->getError());
				}
			}else{
				$this->error($zhuanqu->getError());
			}
		}else{
			$this->meta_title = "添加专区";
			$this->display('edit');
		}
	}

	public function edit(){
		$zhuanqu = D('Zhuanqu');
		if(IS_POST){
			if($zhuanqu->create()){
				if($zhuanqu->save()){
					$this->success('修改成功');
				}else{
					$this->error('没有数据被修改');
				}
			}else{
				$this->error($zhuanqu->getError());
			}

		}else{
			$zhuanqu = $zhuanqu->field(true)->find(I('id'));
			$this->assign('zhuanqu',$zhuanqu);
			$this->meta_title = "修改专区";
			$this->display();
		}
	}
}