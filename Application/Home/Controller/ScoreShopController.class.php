<?php
namespace Home\Controller;
use Think\Controller;
/**
 *积分商城控制器
 */
class ScoreShopController extends CommonController{

	public function __construct(){

		parent::__construct();
	}

	public function index(){

		$userInfo=$this->getUserInfo();//var_dump($userInfo);die;
    	$userId=$userInfo['id'];
    	if(!$userId){
    		header("Content-type:text/html;charset=utf-8");
    		$this->redirect('User/login', array(), 3, '3秒后跳转至登陆页面...');
    	}
		$m=D("User");
		$userInfo=$m->getUserInfoAll($userId);

		$sm=D("ScoreShop");
		$list=$sm->getList();//print_r($list);die;
// print_r($userInfo);die;
		$this->assign('userInfo',$userInfo);
		$this->assign('list',$list);
		$this->display();
	}


	public function goods_info(){

		$id=intval($_GET['id']);   //获取商品的ID
		$goods_info=M()->table("think_score_shop")->where('id='.$id)->find();

		$this->assign('goods_info',$goods_info);
		$this->display();
	}


	/**
	 *执行积分兑换操作
	 */
	public function getGoods(){

		$address=addslashes(trim($_POST['address']));
		$name=addslashes(trim($_POST['name']));

		$score=intval($_POST['score']);
		$id=intval($_REQUEST['id']);//echo $id;var_dump(M()->table('think_score_shop')->where('id='.$id)->find());die;
		$userInfo=$this->getUserInfo();//var_dump($userInfo);die;
    	$userId=$userInfo['id'];

		$re=M()->table("think_score_shop")->where('id='.$id.' and price='.$score.' and isDel=0')->select();
		if(!$re){
			exit(json_encode(array('status'=>'-1','msg'=>'商品不存在或已删除！')));
		}

		$um=D('User');
		$res=$um->checkScore($userId,$score);
		if(!$res){
			exit(json_encode(array('status'=>'-2','msg'=>'积分不足！')));
		}

		$m=D('ScoreShop');
		$res=$m->getGoods($userId,$id,$score);
		if(!$res){
			exit(json_encode(array('status'=>'-1','msg'=>'商品不存在或已删除！')));
		}
		$data=array('goods_id'=>$id,'uid'=>$userId,'price'=>$score,'mobile'=>intval($_POST['mobile']),'address'=>$address,'name'=>$name);
		$re=$m->logShopHistory($data);
		if(!$re){
			exit(json_encode(array('status'=>'-1','msg'=>'商品不存在或已删除！')));
		}
		exit(json_encode(array('status'=>'1','msg'=>'兑换成功，工作人员将在2个工作日内联系您！')));
		
	}


}




?>