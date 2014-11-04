<?php
namespace Home\Controller;
use Think\Controller;
/**
 *网站前台公共类
 *初始化、登陆、验证....
 */
class CommonController extends Controller {

	public $isLogin;//用户是否登陆
	public $isMobile=1;
    
    /**
     *控制器初始化配置
     */
	public function __construct(){

		parent::__construct();
		$this->isLogin=$this->isLogin();
		$this->assign('isLogin',$this->isLogin);
		// var_dump(isMobile());die;
		if(!isMobile()){
			C('DEFAULT_THEME','web');
			C('TMPL_ACTION_SUCCESS',MODULE_PATH.'View/web/Public/success.html');
			$this->isMobile=0;
		}
		$kk=$this->getUserInfo();
		$conmon_user=D('User')->getUserInfoAll($kk['id']);
		// var_dump($conmon_user);die;
		$fabu_num=M()->table('think_review')->where("uid=".$conmon_user[0]['uid'])->count();
		$this->assign('fabu_num',$fabu_num);
		$this->assign('conmon_user',$conmon_user);
	}

	/**
     *获取用户信息
     *@return false|mixed
     */
	public function getUserInfo(){

		$loginInfo=empty($_SESSION['loginInfo'])?$_COOKIE['think_loginInfo']:$_SESSION['loginInfo'];
		if(empty($loginInfo)){
			return false;
		} else {
			$data = json_decode(base64_decode($loginInfo), true);
			if(!empty($data)){
				return $data;
			}
		}
	}

	/**
     *用户登陆验证
     *@return boolean
     */
	public function isLogin(){

		$userInfo=$this->getUserInfo();
		if(!empty($userInfo)){
			$this->assign('isLogin',1);
			$userName=empty( $userInfo['name'] ) ? $userInfo['account'] : $userInfo['name'];
			$this->assign('userName',$userName);
			return true;
		}else{
			$this->assign('isLogin',0);
			return false;
		}
	}

	/**
     *保存用户登陆信息
     */
	public function saveUserIfo($userInfo,$isMember=0){

		if(!$userInfo){
			return false;
		}
		$_SESSION['loginInfo']=base64_encode(json_encode($userInfo));
		//保存用户登陆信息在本地一周 
		if($isMember){
			cookie('loginInfo',$_SESSION['loginInfo'],array('expire'=>24*3600*7,'prefix'=>'think_'));
		}
	}


}