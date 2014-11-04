<?php
namespace Home\Controller;
use Think\Controller;
/**
 *首页控制器
 */
class IndexController extends CommonController {

	public function __construct(){

		// $this->isLogin();
		parent::__construct();
    header("Content-type:text/html;charset=utf-8");
	}

	/**
	 *首页
	 */
    public function index(){
      // var_dump($this->isLogin);die;
      /*import("Lib/Page");   //引入分页类
      $count=M()->table("think_review as r")->where($where)->count();
      $page=new \Page($count,5);*/
      $listHot=M()->field("r.*,p.name,u.name as uname,i.image as touxiang")->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->join("think_user as u on r.uid=u.id")->order(" comment_count desc,time desc ")->join("think_user_info as i on i.uid=r.uid")->where('r.checked=1')->limit(0,5)->select();
      $listNew=M()->field("r.*,p.name,u.name as uname,i.image as touxiang")->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->join("think_user as u on r.uid=u.id")->order(" time desc ")->join("think_user_info as i on i.uid=r.uid")->where('r.checked=1')->limit(0,5)->select();
      // print_r($listHot);die;
      foreach($listHot as $k=>$v){
        $sql="select `thumb_img` from think_review_img where rid=".$v['id'];
        $imgArr=M()->query($sql);
        if($v['image']){
          $cString=toThumbImg($v['image']);
          // $imgArr[]=array('thumb_img'=>$cString);
          array_unshift($imgArr,array('thumb_img'=>$cString));
        }
        $listHot[$k]['image']=$imgArr; 
      }
      foreach($listNew as $k=>$v){
        $sql="select `thumb_img` from think_review_img where rid=".$v['id'];
        $imgArr=M()->query($sql);
        if($v['image']){
          $cString=toThumbImg($v['image']);
          // $imgArr[]=array('thumb_img'=>$cString);
          array_unshift($imgArr,array('thumb_img'=>$cString));
        }
        $listNew[$k]['image']=$imgArr;
      }
      // print_r($listNew);die;
      $this->assign('listNew',$listNew);
      $this->assign('listHot',$listHot);
      $this->assign('act','index');
      // $this->assign('page',$page->show());
      $this->display();
    }

    /*
    */
    public function searchIndex(){

      $this->assign('act','search');
      $this->display();
    }


    /**
	   *搜索结果
	   */
    public function search(){
// print_r($_REQUEST);die;
      $this->assign('act','search');
      $kword=trim($_REQUEST['kword']);
      $where=' 1=1 ';

      if(!empty($_REQUEST['shiti']) && empty($_REQUEST['wangzhi']))   //搜实体店
      {
        $where .= ' and r.store_type=1 ';
        if(!empty($_REQUEST['kword'])){
          $where .= " and ( r.product_name like '%".I('get.kword')."%' or r.store_name like '%".I('get.kword')."%')   ";
        }
        if(!empty($_REQUEST['province'])){
          $where .= " and r.province link '%".I('get.province')."%' ";
        }
        if(!empty($_REQUEST['city'])){
          $where .= " and r.city link '%".I('get.city')."%' ";
        }
        if(!empty($_REQUEST['county'])){
          $where .= " and r.district like '%".I('get.county')."%' ";
        }
      }
      elseif(empty($_REQUEST['shiti']) && !empty($_REQUEST['wangzhi']))   //搜网址
      {
        $where .= " and r.store_type=0 ";
        if(!empty($_REQUEST['kword'])){
          $where .= " and (r.product_name like '%".I('get.kword')."%' or r.address like '%".I('get.kword')."%') ";
        }
      }
      else   //拼接混合查询sql语句
      {
        if(!empty($_REQUEST['kword'])){
          $where .= " and ((r.store_type=1 and (r.product_name like'%".I('get.kword')."%' or r.store_name like '%".I('get.kword')."%')";
        }
        if(!empty($_REQUEST['province'])){
          $where .= " and r.province link '%".I('get.province')."%' ";
        }
        if(!empty($_REQUEST['city'])){
          $where .= " and r.city link '%".I('get.city')."%' ";
        }
        if(!empty($_REQUEST['county'])){
          $where .= " and r.district like '%".I('get.county')."%' ";
        }
        if(!empty($_REQUEST['kword'])){
          $where .= ") or (r.store_type=0 and (r.product_name like '%".I('get.kword')."%' or r.address like '%".I('get.kword')."%'))) ";
        }
      }

      // echo $where;die;
      import("Lib/Page");   //引入分页类
      $count=M()->table("think_review as r")->where($where)->count();
      // echo M()->getLastSql();die;
      $page=new \Page($count,10);
      // $list=M()->field('r.*,p.name,p.id as p_id')->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->where($where)->order(" time desc ")->limit($page->firstRow,$limit->listRows)->select();
      $list=M()->field("r.*,p.name,u.name as uname,i.image as touxiang")->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->join("think_user as u on r.uid=u.id")->order(" comment_count desc,time desc ")->join("think_user_info as i on i.uid=r.uid")->where($where)->limit($page->firstRow,$page->listRows)->select();
      // echo M()->getLastSql();die;
      foreach($list as $k=>$v){
        $sql="select `thumb_img` from think_review_img where rid=".$v['id'];
        $imgArr=M()->query($sql);
        if($v['image']){
          $cString=toThumbImg($v['image']);
          // $imgArr[]=array('thumb_img'=>$cString);
          array_unshift($imgArr,array('thumb_img'=>$cString));
        }
        $list[$k]['image']=$imgArr; 
      }
      // print_r($list);die;
      if(isset($_REQUEST['shiti'])){
        $this->assign('shiti',$_REQUEST['shiti']);
      }
      if(isset($_REQUEST['wangzhi'])){
        $this->assign('wangzhi',$_REQUEST['wangzhi']);
      }
      if(isset($_REQUEST['province'])){
        $this->assign('province',$_REQUEST['province']);
      }
      if(isset($_REQUEST['city'])){
        $this->assign('city',$_REQUEST['city']);
      }if(isset($_REQUEST['county'])){
        $this->assign('county',$_REQUEST['county']);
      }
      $this->assign('list',$list);
      $this->assign('kword',$kword);
      $this->assign('page',$page->show());
      $this->assign('store_type',intval($_REQUEST['store_type']));
      $this->display();
    }


    public function research(){

      // print_r($_POST);die;
      $kword=trim($_REQUEST['kword']);   //第一次查询的关键字
      $store_type=intval($_REQUEST['store_type']);   //第一次查询的类型
      $product=trim($_REQUEST['product']);
      $province=trim($_REQUEST['province']);
      $city=trim($_REQUEST['city']);
      $county=trim($_REQUEST['county']);

      $where=" r.store_type=".$store_type;
      if($store_type==1){
        $where.=" and r.store_name like '%".$kword."%' ";
      }else{
        $where.=" and r.address like '%".$kword."%' ";
      }

      if($province){
        $where.=" and r.province like '%".$province."%' ";
      }
      if($city){
        $where.=" and r.city like '%".$city."%' ";
      }
      if($county){
        $where.=" and r.district like '%".$county."%' ";
      }
      if($product){
        $where.=" and r.product_name like '%".$product."%' ";
      }

      /*import("Lib/Page");   //引入分页类
      $count=M()->table("think_review as r")->where($where)->count();
      $page=new \Page($count,10);*/
      $list=M()->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->where($where)->order(" time desc ")->limit(0,5)->select();

      $this->assign('list',$list);
      $this->assign('kword',$kword);
      $this->assign('product',$product);
      // $this->assign('page',$page->show());
      $this->assign('store_type',intval($_REQUEST['store_type']));
      $this->display();
    }

    /**
     *ajax获取更多列表
     */
    public function getListMore(){

      $listcount=intval($_POST['listcount']);
      if($_POST['istype']=="hot"){
        $order=" comment_count desc,time desc ";
      }else{
        $order=" time desc ";
      }
      $coun=$_POST['coun'];
      $list=M()->field("r.*,p.name,u.name as uname,i.image as touxiang")->table("think_review as r")->join("think_product_category as p on r.product_category_id=p.id")->join("think_user as u on r.uid=u.id")->join("think_user_info as i on i.uid=r.uid")->where('r.checked=1')->order($order)->limit(($coun-1)*$listcount,$listcount)->select();
      if(empty($list)){
        exit(json_encode(array('status'=>0)));
      }
      foreach($list as $k=>$v){
        $sql="select `thumb_img` from think_review_img where rid=".$v['id'];
        $imgArr=M()->query($sql);
        if($v['image']){
          $cString=toThumbImg($v['image']);
          // $imgArr[]=array('thumb_img'=>$cString);
          array_unshift($imgArr,array('thumb_img'=>$cString));
        }
        $list[$k]['image']=$imgArr;
      }
      // print_r($list);die;
      // echo M()->getLastSql();die;
      $this->assign('list',$list);
      $html=$this->fetch("Index:getlistmore.widget");
      echo json_encode(array('status'=>1,'html'=>$html));
    }


    /**
     *
     */
    public function test(){

      $this->success("您的帖子已成功提交，但为了保证帖子质量，本吧所发的帖子待系统审核通过后才能显示，请您耐心等待",U('Home/User/index'),10000);
    }

}