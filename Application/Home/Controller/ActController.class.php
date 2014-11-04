<?php
namespace Home\Controller;
use Think\Controller;
/**
 *用户行为控制器
 */
class ActController extends CommonController {

	public function __construct(){

		// $this->isLogin();
		parent::__construct();
    $this->assign('act','act');
	}

	/**
	 *发布网评-模板
	 */
  public function addReview(){

    if(!$this->isLogin()){
      header("Content-type:text/html;charset=utf-8");
      $this->redirect('User/login',array(),0.5,"<script>alert('请先登录,点击确定跳转到登录界面...');</script>");
    }
       
    $type=intval($_GET['type']);  //0:网店，1:实体
    $this->assign('type',$type);
    $this->display();
  }

  /**
   *发布网评-执行页
   *Ajax执行
   */
  public function saveAdd(){
    // var_dump($_GET);var_dump($_POST);die;
    // ini_set('upload_max_filesize',"10M");
    if(!$this->isLogin()){
      // header("location:");
    }
    // print_r($_POST);die;
    $userInfo=$this->getUserInfo();
    $uid=$userInfo['id'];
    if(!$uid){
      // exit(json_encode(array('status'=>-2,'msg'=>'')));
      $this->success('发布失败,请先登陆'.$fileUpload->errmsg(),U('User/login'),5);
    }
    import("Lib/fileUpload");   //引入图片上传类
    $fileUpload=new \fileUpload();//print_r($_FILES);die;
    
    $savePath="Uploads/Picture/Review/".date("Y-m-d",time());
    if(!is_file($savePath)){
      mkdir($savePath);
    }
    $fileUpload->Upload($savePath, $fileFormat='',$maxSize = 0, $overwrite = 0);  //设置图片信息
    $fileUpload->thumb=1;
    $res=$fileUpload->run("aaa2");   //保存图片
    // var_dump($fileUpload);die;
    if($res){
      $image=$fileUpload->returnArray; //返回图片url
      // $img=array();
      // foreach($image as $k=>$v){
      //   $img[]="Uploads/Picture/Review/".date("Y-m-d",time())."/".$v['saveName'];   //所有图片的url，逗号拼接
      //   $thumb_img[]="Uploads/Picture/Review/".date("Y-m-d",time())."/_thumb_".$v['saveName'];
      // }
    }else{
      // exit(json_encode(array('status'=>-1,'msg'=>$fileUpload->errmsg())));
      $this->success('发布失败,不支持的图片类型,请重新选择图片。'.$fileUpload->errmsg(),U('Act/addReview'),5);
    }
     
    $fileUpload->returnArray='';
    $re=$fileUpload->run("aaa1");
    $img=$fileUpload->returnArray;
    
    $data['image']="Uploads/Picture/Review/".date("Y-m-d",time())."/".$img[0]['saveName'];
    $data['store_type']=$_POST['store_type'];
    $data['store_name']=$_POST['store_name'];
    $data['province']=$_POST['s_province'];
    $data['city']=$_POST['s_city'];
    $data['district']=$_POST['s_county'];
    $data['content']=$_POST['content'];
    $data['product_name']=$_POST['product_name'];
    $data['address']=$_POST['address'];
    if($_POST['store_type']==0){  //网店
      unset($data['store_name']);
      unset($data['province']);
      unset($data['city']);
      unset($data['district']);
    }
    $data['time']=time();
    $data['checked']=0;
    $data['product_category_id']=1;
    // print_r($data);die;
    $data['uid']=$uid;  //print_r($data);die;
    $rid=M()->table('think_review')->add($data);   //返回的rid
    foreach($image as $k=>$v){
      M()->table('think_review_img')->add(array('rid'=>$rid,'image'=>"Uploads/Picture/Review/".date("Y-m-d",time())."/".$v['saveName'],'thumb_img'=>"Uploads/Picture/Review/".date("Y-m-d",time())."/_thumb_".$v['saveName']));
    }
    if($rid){
      // exit(json_encode(array('status'=>1,'msg'=>'发布成功','rid'=>$rid)));
      $this->success('您的帖子已提交，我们将尽快审核，并将审核后的结果发送至您私信箱。',U('Index/index'),5);
    }else{
      // exit(json_encode(array('status'=>-1,'msg'=>'数据错误，请稍后再试')));
      $this->success('发布失败，请检查您的发布内容，并重新发布。',U('Act/addReview'),5);
    }
  }

  /**
	 *网评详情
	 */
  public function reviewInfo(){

    $this->assign('act','index');
    $id=intval($_GET['id']);
    $model=D("Review");
    import("Lib/Page");   //引入分页类
    $count=M()->table("think_reply")->where("rid=".$id." and pid=0")->count();
    // echo M()->getLastSql();die;
    // echo $count;die;
    $page=new \Page($count,10);
    $data=$model->getReviewInfo($id,$page->firstRow,$page->listRows);

    $userInfo=$this->getUserInfo();
    $uid=$userInfo['id'];
    if(M()->table("think_follow")->where("flollow_id=".$uid." and uid=".$data['wangping']['uid'])->select()){
      $guanzhu=1;
    }else{
      $guanzhu=0;
    }
    $arr=M()->table("think_user_info")->where("uid=".$uid)->find();
    $shoucang=$arr['favorites'];
    // print_r($shoucang);die;
    $shoucangarr=array_filter(explode(",", $shoucang));
    if(in_array($id, $shoucangarr)){
      $shoucang=1;
    }else{
      $shoucang=0;
    }
    
    $this->assign('shoucang',$shoucang);
    $this->assign('id',$id);
    $this->assign('guanzhu',$guanzhu);
    // print_r($data);die;
    $this->assign('page',$page->show());
    $this->assign('list',$data); //print_r($data);die;
    $this->display();
  }

  /**
   *网评详情-回复
   *Ajax执行
   */
  public function replay(){

    $fatieid=intval($_POST['uid']);   //发帖人ID
    $userInfo=$this->getUserInfo();
    if(!$userInfo['id']){
      exit(json_encode(array('status'=>-2,'msg'=>'请先登录')));
    }
    $data['uid']=$userInfo['id']; //自己的ID
    $data['rid']=intval($_POST['rid']);   //主题ID
    $data['content']=trim($_POST['content']);  //回复内容
    $data['reuid']=$fatieid;
    $data['pid']=0;
    if($_POST['pid']){
      $data['pid']=intval($_POST['pid']);
      $data['reuid']=intval($_POST['reuid']);
    }
    $data['time']=time();
    $res=M()->table("think_reply")->add($data);   //插入回复表
    if($res){
      if($data['pid']==0){
        $data2['uid']=$fatieid;
      }else{
        $fuifuArr=M()->table("think_reply")->where("id=".$data['pid'])->select();
        $data2['uid']=$fuifuArr[0]['uid'];
      }
      $data2['fid']=$userInfo['id'];   //回复者的id
      // $data2['user_name']=$userInfo['name'];   //对方的username
      $data2['time']=time();
      $data2['review_id']=$data['rid'];
      $data2['reply_id']=isset($_POST['pid'])?$data['pid']:0;
      $data2['readed']=0;
      // print_r($data2);die;
      M()->table('think_message')->add($data2);
      $n=M()->table("think_review")->field('comment_count')->where('id='.$data['rid'])->select();
      $num=$n[0]['comment_count']; //得到评论数
      M()->table("think_review")->where('id='.$data['rid'])->save(array('comment_count'=>($num+1)));
      // echo M()->getLastSql();die;
      unset($data);
      unset($data2);
      exit(json_encode(array('status'=>1,'msg'=>'发布成功！')));
    }else{
      unset($data);
      exit(json_encode(array('status'=>-1,'msg'=>'发布失败，请刷新页面后重试')));
    }
  }

  /**
   *Ajax执行关注
   */
  public function follow(){

    $userInfo=$this->getUserInfo();
    if(!$userInfo){
      exit(json_encode(array('status'=>-1,'msg'=>'请先登录')));
    }
    $uid=intval($_POST['id']);   //关注的人用户
    $myid=$userInfo['id'];   //自己的id
    if($uid==$myid){
      exit(json_encode(array('status'=>-2,'msg'=>'自己不能关注自己')));
    }
    // $uarr=M()->table("think_user_info")->field(array('follow_count','fans_count'))->where('uid='.$uid)->select();
    // $uarr=$uarr[0];
    // $myarr=M()->table("think_user_info")->field(array('follow_count','fans_count'))->where('uid='.$myid)->select();
    // $myarr=$myarr[0];
    // echo $myid;echo $uid;die;
    if($_POST['act']=='add'){
      if(M()->table("think_follow")->where('uid='.$uid." and flollow_id=".$myid)->find()){
        exit(json_encode(array('status'=>-3,'msg'=>'已关注')));
      }
      $res=M()->table("think_follow")->add(array('uid'=>$uid,'flollow_id'=>$myid));
      if(!$res){
        // echo M()->getLastSql();die;
        exit(json_encode(array('status'=>-3,'msg'=>'数据错误，请刷新重试')));
      }
    }elseif($_POST['act']=='del'){
      $res=M()->table("think_follow")->where("uid=".$uid." and flollow_id=".$myid)->delete(array('uid'=>$uid,'flollow_id'=>$myid));
      if(!$res){
        exit(json_encode(array('status'=>-4,'msg'=>'数据错误，请刷新重试')));
      }else{
        M()->table("think_user_info")->where('uid='.$uid)->setDec('fans_count',1);
        M()->table("think_user_info")->where('uid='.$myid)->setDec('follow_count',1);
        exit(json_encode(array('status'=>1,'msg'=>'取消关注成功')));
      }
    }
    M()->table("think_user_info")->where('uid='.$uid)->setInc('fans_count');
    // M()->table('think_user_info')->where('uid='.$uid)->save(array('fans_count'=>($uarr['fans_count']+1)));
    // M()->table('think_user_info')->where('uid='.$myid)->save(array('follow_count'=>($uarr['follow_count']+1)));
    M()->table("think_user_info")->where('uid='.$myid)->setInc('follow_count');
    exit(json_encode(array('status'=>1,'msg'=>'关注成功')));
  }

  /**
   *收藏评论
   */
  public function collect(){

    $rid=intval($_POST['rid']);
    $userInfo=$this->getUserInfo();
    $uid=$userInfo['id'];
    if(!$uid){
      exit(json_encode(array('status'=>-1,'msg'=>'请先登录')));
    }
    $m=D('User');
    $colloctid=$m->getUserInfoAll($uid);
    $colstr=$colloctid[0]['favorites'];
    $colARR=array_filter(explode(",", $colstr));
    if(in_array($rid, $colARR)){
      exit(json_encode(array('status'=>-1,'msg'=>'已经收藏了该评论')));
    }else{
      $res=M()->table("think_user_info")->where("uid=".$uid)->save(array('favorites'=>$colstr.$rid.","));
      // $sql="update think_review set `collect_count`=`collect`+1 where rid=".$rid;
      M()->table("think_review")->where('id='.$rid)->setInc('collect_count');//query($sql);
      if(!$res){
        exit(json_encode(array('status'=>-2,'msg'=>'数据错误，请刷新重试')));
      }else{
        exit(json_encode(array('status'=>1,'msg'=>'收藏成功')));
      }
    }
  }


  /**
  *取消收藏
  */
  public function delCollect(){

    $rid=intval($_POST['rid']);
    $userInfo=$this->getUserInfo();
    $uid=$userInfo['id'];
    if(!$uid){
      exit(json_encode(array('status'=>-1,'msg'=>'请先登录')));
    }
    $m=D('User');
    $colloctid=$m->getUserInfoAll($uid);
    $colstr=$colloctid[0]['favorites'];
    $colARR=array_filter(explode(",", $colstr));
    if(!in_array($rid, $colARR)){
      exit(json_encode(array('status'=>-1,'msg'=>'还没有收藏该评论')));
    }
    if(count($colARR)==1){$str='';}else{
      foreach($colARR as $k=>$v){
        if($v==$rid){
          unset($colARR[$k]);
        }
      }
      $str=implode(",", $colARR).',';
    }
    $res=M()->table("think_user_info")->where("uid=".$uid)->save(array('favorites'=>$str));
    // $sql="update think_review set `collect_count`=`collect`+1 where rid=".$rid;
    M()->table("think_review")->where('id='.$rid)->setDec('collect_count');//query($sql);
    if(!$res){
      exit(json_encode(array('status'=>-2,'msg'=>'数据错误，请刷新重试')));
    }else{
      exit(json_encode(array('status'=>1,'msg'=>'操作成功')));
    }
  }


  /**
   *Ajax执行 +赞 操作
   */
  public function addZan(){


  }


}