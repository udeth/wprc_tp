<?php

use Think\Upload;

	// 网评控制器
class ReviewController extends AdminController {
	const IMG_FOLDER = 'Picture/Review/';	// 保存图片的目录
	
		// 列表
    public function index(){
			// 获取网评信息
    	$m=D('Review');
		$list = $m->readList(I('name'));
		$countArr=$m->getCount();
		$countG=0;   //通过审核
		$countB=0;	 //不通过审核
		$countW=0;	 //未审核
		foreach($countArr as $k=>$v){
			if($v['checked']==0){
				if($v['num']>0){
					$countW=$v['num'];
				}
			}elseif($v['checked']==1){
				if($v['num']>0){
					$countG=$v['num'];
				}
			}elseif($v['checked']==2){
				if($v['num']>0){
					$countB=$v['num'];
				}
			}
		}
		$this->assign('countG',$countG);
		$this->assign('countB',$countB);
		$this->assign('countW',$countW);
		$this->assign('countArr',$countArr);
		$this->assign( '_list', $list );//print_r($countArr);die;
		$this->meta_title = '网评管理';
        $this->display();
    }
	
		// 详细信息
	public function detail(){
		$id = I('id');
		if( !$id ){	// 误操作
			$this->redirect('index');
			return;
		}
			
			// 读取数据
		$data = D('Review')->readItem($id);
		$this->assign( 'data', $data );//print_r($data);die;
			// 读取图片
		$imglist = M('Review_img')->where( 'rid=' . $id )->select();
		$this->assign( 'imglist', $imglist );
		$this->meta_title = '网评详情';
		$this->display();
	}
	
		// 添加
	public function add(){
		if( IS_POST ){
				// 上传购买凭证
			$upload = new Upload();
			$upload->savePath = self::IMG_FOLDER;
			$upload->saveName = 'my_upload_name';
			$file = $upload->uploadOne( $_FILES['image'] );
				
				// 设置网评基本信息
			$_POST['image'] = $file['savepath'] . $file['savename']; 
			$_POST['time'] = time();
				
				// 数据插入到数据库
			$m = D('Review');
			if( $m->create() ){
				$rid = $m->add();
				if( $rid ){
					unset( $_FILES['image'] );	// 删除凭证图片
					if( $this->addImage( $rid ) ){	// 添加网评图片
						$this->success('添加网评成功！', U('index'));
					}
				}else{
					$this->error('添加网评失败！');
				}
			}else{
				$this->error( $m->getError() );
			}
		}else{
				// 读取产品目录
			$cats = D('product_category')->readTree(false);
			$this->assign('cats', $cats);
			$this->display();
		}
	}
	
		// 添加网络图片
	private function addImage( $rid ){
			// 没有附加图片
		if( count( $_FILES ) == 0 )
			return true;
			
			// 上传附近图片
		$upload = new Upload();
		$upload->savePath = self::IMG_FOLDER;
		$upload->saveName = 'my_upload_name';
		$file = $upload->upload();
			
			// 数据插入到数据库
		foreach( $file as $f ){
			$data['rid'] = $rid;
			$data['image'] = $f['savepath'] . $f['savename'];
			$m = M('review_img');
			if( $m->create($data) ){
				if( !$m->add() ){
					$this->error('添加图片失败');
					return false;
				}
			}
			else{
				$this->error( $m->getError() );
				return false;
			}
		}
		return true;
	}

		// 修改产品
	public function edit(){
		if( IS_POST ){
			$errorArr=array(1=>'照片内容不符合要求',2=>'内容包含灌水、广告或不良信息',3=>'其他原因');
			$error=$errorArr[$_POST['why']];
			unset($_POST['why']);
			$m = M('Review');
			if( $m->create() ){
				$res = $m->save();

				$uid = $_POST['uid'];

				$data = D('User')->field('id,pid')->find($uid);

				$Ui = D('UserInfo');

				if($res){
					$xinxi = D('Xinxi');
					$content = $m->field('product_name')->find($_POST['id']);
					$arr = array(
						'sendId' => 2,
						'saveId' => $data['id'],
						'time' => time(),
						'isRead' => 0
						);
					if($_POST['checked']==2){

						$arr['content'] = "您发表的 <a style='color:red' href='".U('Home/Act/reviewInfo')."?id=".$_POST['id']."'>" . $content['product_name'] . '</a> 未通过审核!原因是：'.$error."。邀请朋友来网评如潮，您将获得更多积分~";
					}else{
						$arr['content'] = "您发表的 <a style='color:red' href='".U('Home/Act/reviewInfo')."?id=".$_POST['id']."'>" . $content['product_name'] . '</a> 已经审核通过!恭喜您获得1积分，您的邀请人获得10个积分，积分可以在积分商城获取您想要的物品，亲赶紧邀请您的朋友一起来网评如潮吧~';
					}
					if($xinxi->create($arr)){
						if($xinxi->add()){

						}else{

						}
					}else{

					}

					$Ui->where('uid='.$data['id'])->setInc('score',1);
					if($data['pid']){
						$Ui->where('uid='.$data['pid'])->setInc('score',10);
					}	
				}
				$this->success("修改成功！",U('index'));
			}else{
				$this->error( $m->getError() );
			}
		}else{
			$id = I('id');
			if( !$id ){	// 误操作
				$this->redirect('index');
				return;
			}
				
				// 读取数据
			$data = D('Review')->readItem($id);
			$this->assign( 'data', $data );
				// 读取图片
			$imglist = M('Review_img')->where( 'rid=' . $id )->select();
			$this->assign( 'imglist', $imglist );
			$this->meta_title = '网评修改';
			$this->display();
		}
	}
	
		// 删除
	public function delete(){
		$id = I('id');
		if( !$id ){	// 误操作
			$this->redirect('index');
			return; 
		}
		
		$map['id'] = array( 'in', $id );
		$pathList = M('Review')->where($map)->field('image')->select();
		if( M('Review')->where($map)->delete() ){
			foreach( $pathList as $path ){
				$imgPath = './Uploads/' . $path['image'];
				unlink( $imgPath );
			}
			$this->deleteImage($id);
			$this->success('网评删除成功！');
		}
		else
			$this->error('网评删除失败！');
	}		
	
		// 删除图片
	private function deleteImage($id){
		$map['rid'] = array( 'in', $id );
		$imgList = M('review_img')->where($map)->field('image')->select();
		foreach( $imgList as $img ){
			$imgPath = './Uploads/' . $img['image'];
			unlink( $imgPath );
		}
		M('review_img')->where($map)->delete();
	}
}
