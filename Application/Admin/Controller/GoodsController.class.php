<?php

class GoodsController extends AdminController{

	public function index(){
		$fieldAry = array(
			'S.id',
			'S.shop_name',
			'S.introduce',
			'S.price',
			'Z.zhuanqu_name',
			'if(S.isDel=0,"正常","删除")' => 'status'
			);
		$goods = D('ScoreShop')->alias('S')->field($fieldAry)->join('__ZHUANQU__ as Z on S.zhuanqu_id = Z.id','left')->where('S.isDel = 0')->select();
		//$goods = M()->query("SELECT S.*,Z.zhuanqu_name FROM think_score_shop AS S LEFT JOIN think_zhuanqu AS Z ON S.zhuanqu_id = Z.id");
		$this->assign('goods',$goods);
		$this->meta_title = '商品列表';
		//print_r($goods);
		$this->display();
	}

	public function delete(){
		$id = array_unique((array)I('id'));
		$id = is_array($id) ? implode(',',$id) : $id;
		if(empty($id)){
			$this->error('请选择要删除的数据！');
		}
		$map['id'] = array('in',$id);
		if(D('ScoreShop')->where($map)->save(array('isDel'=>1))){
			$this->success('删除成功');
		}
		
	}

	public function add(){
		$zhuanqu = D('zhuanqu');
		$scoreshop = D('ScoreShop');
		if(IS_POST){
			if($res = $scoreshop->create()){
				if($id = $scoreshop->add()){
					$this->addImage($id);
				}else{
					$this->erroe($scoreshop->getError());
				}
			}else{
				$this->error($scoreshop->getError());
			}

		}else{
			$zhuanqu = $zhuanqu->field(true)->select();
			$this->assign('zhuanqu',$zhuanqu);
			$this->meta_title = "添加商品";
			$this->display('edit');
		}
	}


	//上传产品主图
	public function addImage($id){
		$ScoreShop = D('ScoreShop');
		$config = array(
			//'rootPath' => './Public/',
			'savePath' => '/Images/Product/',
			'exts' => array('jpg'),
			'subName' => array('date','Ymd')
			);
		$upload = new \Think\Upload($config);
		if($info = $upload->upload()){
			//print_r($info);
			foreach ($info as $key => $value) {
				$image = new \Think\Image();
				$image->open('Uploads/'.$value['savepath'].$value['savename']);
				$thumbImg = $value['savepath'].'thumb_'.$value['savename'];
				$image->thumb(150, 150)->save('Uploads/'.$thumbImg);
				$img = array('id' => $id,'image' => $value['savepath'].$value['savename'],'thumb_img' => $thumbImg);
				if($ScoreShop->save($img)){
					$this->success("添加商品成功！");
				}else{
					$this->error($ScoreShop->getError());
				}
			}
			//print_r($imgurl);
			
		}else{
			$this->success($upload->getError());
		}
	}




}