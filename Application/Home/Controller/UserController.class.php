<?php
namespace Home\Controller;
use Think\Controller;
/**
 *首页控制器
 */
class UserController extends CommonController {



	public function __construct(){
    
    parent::__construct();
    $this->assign('act','user');
	}

  /**
   *用户中心首页
   */    
  public function index(){
    // var_dump($this->isLogin);die;
    if(!$this->isLogin){  //检测登陆状态，未登录，返回登陆页
      header("location:".U("User/login"));
    }
    $this->display();
  }

	/**
	 *登陆
	 */
  public function login(){
    if($this->isLogin){  //检测登陆状态，未登录，返回登陆页
      header("location:index");
    }
    $cook=$_COOKIE['think_loginInfo'];
    if($cook){
      $name=json_decode(base64_decode($cook),true);
      $this->assign('name',$name['name']);
    }
   	$this->display();
  }

  /**
   *用户登陆验证
   */
  public function checkLogin(){

    $userName=trim(($_POST['name']));
    $password=md5("wprc123".trim($_POST['password']));
    //实例化model
    $model=D("User");
    $userInfo=$model->getUserInfo($userName);//var_dump($userInfo);die;
    if(!$userInfo){
      exit(json_encode(array('status'=>-1,'msg'=>"用户名不存在")));
    }

    if($userInfo['password']!=$password){
      exit(json_encode(array('status'=>-2,'msg'=>"密码错误")));
    }

    //记录登陆信息
    M()->table("think_user_info")->where("account='".$userName."'")->save(array('ip'=>ip2long($_SERVER['REMOTE_ADDR'])));
    // echo M()->getLastSql();die;
    $_SESSION['loginInfo']=base64_encode(json_encode($userInfo));
    $this->isLogin=1;
    if($_POST['save']){
      cookie('loginInfo',$_SESSION['loginInfo'],array('expire'=>24*3600*7,'prefix'=>'think_'));
    }
    exit(json_encode(array('status'=>1,'msg'=>"登陆成功！")));
  }

  public function test2(){
    $userInfo=D("User")->getUserInfo('admin');
    print_r($userInfo);
  }

  /**
	 *用户注册
	 */
  public function insert(){

    if(!empty($_POST)){
      //获取参数
      $userName=trim($_POST['name']);
      $password=md5("wprc123".trim($_POST['password']));
      // $repassword=md5("wprc123".trim($_POST['repassword']));
      // $email=trim($_REQUEST['email']);
      // $mobile=trim($_REQUEST['mobile']);

      // if($password!=$repassword){
      //   exit(json_encode(array('status'=>'-1','msg'=>'两次输入密码不一致')));
      // }

      if(strlen(trim($_POST['password']))<6 || strlen(trim($_POST['password']))>12){
        exit(json_encode(array('status'=>'-1','msg'=>'请填写6-12位密码')));
      }

      $model=D("User");
      $userInfo=$model->getUserInfo($userName);//echo M()->getLastSql();die;var_dump($userInfo);die;
      if(!empty($userInfo)){
        exit(json_encode(array('status'=>'-3','msg'=>'用户名已经存在')));
      }
      $data=array('account'=>$userName,'password'=>$password,'name'=>$userName);
      $result=$model->add($data);
      $u=$model->getUserInfo($userName);
      $uid=$u['id'];
      M()->table('think_user_info')->add(array('ip'=>ip2long($_SERVER['REMOTE_ADDR']),'uid'=>$uid,'time'=>time()));
      if(!empty($_POST['pname'])){
        $pname=addslashes(trim($_POST['pname']));
        $pid=M()->table("think_user")->where("account='".$pname."'")->find();
        if(empty($pid)){
          M()->table("think_user")->where('id='.$uid)->delete();
          exit(json_encode(array('status'=>-4,'msg'=>'该邀请人不存在')));
        }
        M()->table("think_user")->where('id='.$uid)->save(array('pid'=>$pid['id']));
      }
      if(!$result){
        exit(json_encode(array('status'=>-2,'msg'=>'数据错误！')));
      }else{
        $userInfo=$model->getUserInfo($userName);
        $_SESSION['loginInfo']=base64_encode(json_encode($userInfo));
        exit(json_encode(array('status'=>1,'msg'=>'注册成功')));
      }
    }

    $this->display();
  }

  /**
   *ajax模板输出
   */
  public function echoAjax( $html ) {

    $ajaxArr = array(
      'status' => 1,
      'html' => $html,
    );

    exit( json_encode($ajaxArr) );

  }

  /**
   *ajax获取用户资料
   */
  public function getindex(){

    $model=D("User");

    $userInfo=$this->getUserInfo();//var_dump($userInfo);die;
    $userId=$userInfo['id'];
    // if(!empty($_POST)){  //接收参数
    //   // print_r($_POST);die;
    //   $data=array();
    //   print_r($_FILES);die;
    //   $data['name']=trim($_POST['userName']);
    //   $data['sex']=isset($_POST['sex'])?$_POST['sex']:1;
    //   $data['province']=isset($_POST['province'])?$_POST['province']:'';
    //   $data['city']=isset($_POST['city'])?$_POST['city']:'';
    //   $data['district']=isset($_POST['district'])?$_POST['district']:'';
    //   $data['ip']=ip2long($_SERVER['REMOTE_ADDR']);
    //   $result=$model->changeInfo($userId,$data);
    //   if(!$result){
    //     exit(json_encode(array('status'=>-1,'msg'=>"请按正确格式填写")));
    //   }else{
    //     exit(json_encode(array('status'=>1,'msg'=>"修改成功！")));
    //   }
    // } 
    
    $userInfoAll=$model->getUserInfoAll($userId);
    // var_dump($userInfoAll);die;
    // $data['num']=M()->table("think_review")->where('uid='.$userId)->count();
    $data['num']=M()->table("think_xinxi")->where('saveId='.$userId." and isRead=0")->count();
    $emodel=D("Review");
    $newList=$emodel->getReviewList(" 1=1 "," time desc ","0,3"); //最 新差评
    $hotList=$emodel->getReviewList(" 1=1 "," comment_count desc ","0,3"); //焦点差评
    $data['newList']=$newList;
    $data['hotList']=$hotList;
    $data['userInfo']=$userInfoAll[0];
    $this->assign('data',$data);//print_r($data);die;
    $html = $this->fetch('User:getindex.widget');
    $this->echoAjax( $html );
  }

  /**
   *个人中心-我的发布
   */
  public function myReview(){

    $model=D("Review");
    $userInfo=$this->getUserInfo();
    $uid=$userInfo['id'];
    import("Lib/Page");  //引入分页类
    $count=$model->where("uid=".$uid)->count();
    $page=new \Page($count,5);
    $list=$model->getReviewList(" uid=".$uid." "," time desc ",$page->firstRow.",".$page->listRows);
    $data=array();
    $data['list']=$list;
    $data['page']=$page->show();
    // foreach($data['list'] as $k=>$v){
    //   if($k=='image'){
    //     if(!empty($v)){
    //       $arr=explode(",", $v['image']);
    //       $arr=array_filter($arr);
    //       $data['list']['$k']['image']=$arr;
    //     }
    //   }
    // }
    $this->assign('data',$data);//print_r($data);die;
    $html = $this->fetch('User:myReview.widget');
    $this->echoAjax( $html );
  }

  /**
   *个人中心-我的消息
   */
  public function myMsg(){

    $userInfo=$this->getUserInfo();
    $userId=$userInfo['id'];    //自己的ID
    $msgArr=M()->field(array('m.id','m.review_id','u.name','r.store_type','r.province','r.city','r.district','r.address','m.time','r.product_name'))->table("think_message as m")->join("think_user as u on m.fid=u.id")->join("think_review as r on m.review_id=r.id")->where('m.uid='.$userId." and m.readed=0 and r.checked=1")->select();   //echo M()->getLastSql();die;//未读消息
    $mySave=M()->field("r.time as rtime,u.*,e.*")->table("think_reply as r")->join("think_user as u on r.uid=u.id")->join("think_review as e on e.id=r.rid")->where(" e.checked=1 and r.reuid=".$userId)->order("rtime desc")->select();  //我收到的评论\
    $mySend=M()->field("r.time as rtime,u.*,e.*")->table("think_reply as r")->join("think_user as u on r.reuid=u.id")->join("think_review as e on e.id=r.rid")->where('e.checked=1 and r.uid='.$userId)->order("rtime desc")->select();   //我发出的评论
    // echo M()->getLastSql();die;
    foreach($mySave as $k=>$v){
      if(!empty($v['image'])){
        $arr=explode(",", $v['image']);
        $arr=array_filter($arr);
        $mySave[$k]['image']=$arr;
      }
    }
     foreach($mySend as $k=>$v){
      if(!empty($v['image'])){
        $arr=explode(",", $v['image']);
        $arr=array_filter($arr);
        $mySend[$k]['image']=$arr;
      }
    }
    $data['count']=count($msgArr);
    $data['msgArr']=$msgArr;  //print_r($msgArr);die;
    $data['mySave']=$mySave;  //print_r($data['mySave']);die;
    $data['mySend']=$mySend;  //print_r($data);die;
    $this->assign('data',$data);
    $html=$this->fetch('User:myMsg.widget');
    $this->echoAjax($html);
  }

  /**
   *个人中心-我的收藏
   */
  public function myCollect(){

    $userInfo=$this->getUserInfo();
    $userId=$userInfo['id'];
    $model=D("User");
    $userInfo=$model->getUserInfoAll($userId);  //print_r($userInfo);die;
    $favorites=$userInfo[0]['favorites'];  //收藏id；
    $str=substr($favorites,0,strlen($favorites)-1);   //id范围

    $rmodel=D("Review");
    import("Lib/Page");
    $count=$rmodel->where("id in (".$str.")")->count();//echo $count;die;
    $page=new \Page($count,5);
    $showList=$rmodel->getReviewList("r.id in (".$str.")"," time desc ",$page->firstRow.",".$page->listRows);
    $data['list']=$showList;//print_r($data);die;//
    $data['page']=$page->show();
    $this->assign('data',$data);
    $html = $this->fetch('User:myCollect.widget');
    $this->echoAjax( $html );
  }

  /**
   *关注和被关在列表
   */
   public function follow(){

    $coun=1; //定义页码
    $userInfo=$this->getUserInfo();
    $myId=$userInfo['id'];   //自己的ID
    $model=D("User");
    if($_POST['coun']){
      $coun=2;
    }
    if(isset($_GET['uid'])){
      $userId=intval($_GET['uid']);
      $userInfo=$model->showUserInfo($userId);   //
      $this->assign('user',$userInfo[0]['name']);   //差看他人的关注信息
    }else{
      $userInfo=$this->getUserInfo();
      $userId=$userInfo['id'];
    }
    if(intval($_GET['type'])==1){
      $followList=$model->getFllowList($userId,($coun-1)*20,$coun*20);  //关注列表
    }else{
      $followList=$model->getbFllowList($userId,($coun-1)*20,$coun*20);  //被关注列表
    }
    $myfllow=$model->getFllowList($myId,1,1,true);
    // print_r($myfllow);die;
    foreach($followList as $k=>$v){
      if(in_array($v['uid'], $myfllow)){
        $followList[$k]['myfollow']=1;   //我已关注
      }elseif ($v['uid']== $myId) {
        $followList[$k]['myfollow']=2;   //就是我自己
      }else{
        $followList[$k]['myfollow']=0;   //木有关系
      }
    }
    $this->assign('type',intval($_GET['type']));
    $this->assign('followList',$followList); 
    // print_r($followList);die;
    $this->display();
  }

  /**
   *修改个人资料
   */
  public function changeInfo(){

    // print_r($_POST);die;
    $userInfo=$this->getUserInfo();
    $userId=intval($userInfo['id']);   //uid
    // print_r($_FILES['img']['name']);die;
    
    import("Lib/fileUpload");   //引入图片上传类
    $fileUpload=new \fileUpload();//print_r($_FILES);die;
    $savePath="Uploads/Picture/User/";
    if($_FILES['img']['name']){
      if(!is_file($savePath)){
        mkdir($savePath);
      }
      $fileUpload->Upload($savePath, $fileFormat='',$maxSize = 0, $overwrite = 0);  //设置图片信息
      $res=$fileUpload->run("img");   //保存图片
      if($res){
        $image=$fileUpload->returnArray; //返回图片url
        $img=$image[0]['saveName'];
        $data['image']=$img;
      }else{
        exit(json_encode(array('status'=>-1,'msg'=>$fileUpload->errmsg())));
      }
    }
    $data1['name']=trim($_POST['name']);
    $data['sex']=intval($_POST['sex']);
    $data['province']=trim($_POST['s_province']);
    $data['city']=trim($_POST['s_city']);
    $data['district']=trim($_POST['s_county']);
    $data['introduction']=trim($_POST['intro']);
    // $data['birthday'];
    $data['QQ']=intval($_POST['QQ']);
    $year=substr($_POST['year'],0,4);
    $month=substr($_POST['month'],0,2);
    $day=substr($_POST['day'],0,2);
    $birthday=$year."-".$month."-".$day;
    $data['birthday']=$birthday;
    // print_r($data);print_r($data1);
    $re1=M()->table("think_user")->where("`id`=$userId")->save($data1);
    $re2=M()->table("think_user_info")->where("`uid`=$userId")->save($data);
    // var_dump($re1);var_dump($re2);die;
    if($re1|| $re2){
      $this->success("修改成功！","index");
    }else{
      $this->error("修改失败！","index");
    }
  }


  /**
   *用户注销登录
   */
  public function logOut(){

    if($_SESSION['loginInfo']){unset($_SESSION['loginInfo']);}
    if($_COOKIE['think_loginInfo']){setcookie('think_loginInfo','',time()-3600,"/");}
    exit(json_encode(array('status'=>1)));
  }


  /**
   *更改消息为已读
   */
  public function changeMsg(){

    $id=intval($_POST['id']);
    $data['readed']=1;
    $res=M()->table("think_message")->where("id=".$id)->save($data);
    // echo M()->getLastSql();die;
    if($res){
      exit(json_encode(array('status'=>1)));
    }
  }


  /**
   *QQ登陆
   */
  public function qqLogin(){

    // $backurl="http%3A%2F%2Fwap.sjbmall.net%2Fhome%2Fuser%2FqqCallback";
    // $url="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=101081670&redirect_uri=".$backurl."&state=test&display=mobile&g_ut=2";
    // header("location:".$url);
    require_once('/Application/Lib/API/qqWapConnectAPI .php');
    $qc = new \QC();
    // echo "sss";die;
    $qc->qq_login();
  }


  /**
   *QQ登陆回调地址
   */
  public function qqCallback(){

    if($_GET['state']){
      require_once('/Application/Lib/API/qqWapConnectAPI .php');
      $qc = new \QC();
      $access_token=$qc->qq_callback();
     
      $url="https://graph.qq.com/oauth2.0/me?access_token=".$access_token;
      $output=file_get_contents($url);
      $lpos = strpos($output, "(");
      $rpos = strrpos($output, ")");
      $response = substr($output, $lpos + 1, $rpos - $lpos -1);  //得到的json数组
      $arr=json_decode($response,true);
      $open_id=$arr['openid'];
      $qc = new \QC($access_token,$open_id);
      $info=$qc->get_user_info();
      // var_dump($info);die;
      if($info){
        $res=M()->table("think_user_qq")->where("open_id='".$open_id."'")->find();
        if($res){
          $uid=$res['uid'];
        }else{
          $data2['account']='';
          $data2['password']='';
          $data2['email']='';
          $data2['name']=$info['nickname'];
          $uid=M()->table("think_user")->add($data2);
          M()->table('think_user_info')->add(array('ip'=>ip2long($_SERVER['REMOTE_ADDR']),'uid'=>$uid,'time'=>time()));
          $data['uid']=$uid;
          $data['open_id']=$open_id;
          $data['access']=$access_token;
          M()->table("think_user_qq")->add($data);
        }
        $userInfo=M()->table("think_user")->where('id='.$uid)->find();
        $this->saveUserIfo($userInfo);
        header("location:index");
      }
    }else{
      exit();
    }
    
  }


  /**
   *微博登陆
   */
  public function weiboLogin(){

    require_once('/Application/Lib/weiboAPI/saetv2.ex.class.php');
    require_once('/Application/Lib/weiboAPI/config.php');
    $weibo=new \SaeTOAuthV2(WB_AKEY,WB_SKEY);
    $url=$weibo->getAuthorizeURL(WB_CALLBACK_URL,'code','test','mobile');
    header("location:".$url);
    // var_dump($res);die;
    // var_dump($weibo);
  }


  /**
   *微博登陆回调地址
   */
  public function weibocallback(){

    $code=$_GET['code'];
    require_once('/Application/Lib/weiboAPI/saetv2.ex.class.php');
    require_once('/Application/Lib/weiboAPI/config.php');
    $weibo=new \SaeTOAuthV2(WB_AKEY,WB_SKEY);
    // $url=$weibo->getAuthorizeURL(WB_CALLBACK_URL,'token','test','mobile');
    $res=$weibo->getAccessToken('code',array('code'=>$code, 'redirect_uri'=>WB_CALLBACK_URL));
    // print_r($res);die;
    $access_token=$res['access_token'];
    $weibouid=$res['uid'];

    $weiboInfo=new \SaeTClientV2(WB_AKEY,WB_SKEY,$access_token);
    $weibouserInfo=$weiboInfo->show_user_by_id($weibouid);
    // var_dump($userInfo);die;
    if($weibouserInfo){
      $res=M()->table("think_user_weibo")->where("weiboUid=".$weibouid)->find();
      if($res){
        $uid=$res['uid'];
      }else{
        $data2['account']='';
        $data2['password']='';
        $data2['email']='';
        $data2['name']=$weibouserInfo['name'];
        $uid=M()->table("think_user")->add($data2);
        M()->table('think_user_info')->add(array('ip'=>ip2long($_SERVER['REMOTE_ADDR']),'uid'=>$uid,'time'=>time()));
        $data['uid']=$uid;
        $data['weiboUid']=$weibouid;
        $data['access']=$access_token;
        M()->table("think_user_weibo")->add($data);
      }
      $userInfo=M()->table("think_user")->where('id='.$uid)->find();
      $this->saveUserIfo($userInfo);
      header("location:index");
    }
  }


  /**
   *用户找回密码
   */
  public function findUser(){

    if($to=$_POST['email']){
      $re=M()->table('think_user')->where("account='".trim($_POST['name'])."'")->find();
      if($re['email']==trim($_POST['email'])){
        require_once('/Application/Lib/phpMailer/class.phpmailer.php');
        $mail=new \PHPMailer();
        // var_dump($re);die;
        $address =$to;
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtp.163.com"; // 您的企业邮局域名
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = "yanghaominok@163.com"; // 邮局用户名(请填写完整的email地址)
        $mail->Password = 'yanghaomin'; // 邮局密码
        $mail->Port=25;
        $mail->From = "yanghaominok@163.com"; //邮件发送者email地址
        $mail->FromName = "网评如潮";
        $mail->AddAddress("$address", "a");
        // $mail->AddAttachment("/var/tmp/file.tar.gz"); // 添加附件
        $mail->IsHTML(true); // set email format to HTML //是否使用HTML格式
        $mail->Subject = "网评如潮重置密码"; //邮件标题
        $mail->Body = "<p>".trim($_POST['name']).",您好</p><p>感谢使用<a href='http://wap.sjbmall.net'>网评如潮</a>，请点击以下链接重置你的密码:http://wap.sjbmall.net/home/user/changePw?code=".base64_encode($re['account']."||".$re['email'])."</p>"; //邮件内容
        $mail->AltBody = "This is the body in plain text for non-HTML mail clients"; //附加信息，可以省略
        if(!$mail->Send())
        {
          // echo "邮件发送失败. <p>";
          // echo "错误原因: " . $mail->ErrorInfo;
          exit(json_encode(array('status'=>-1,'msg'=>"邮件发送失败,错误原因:".$mail->ErrorInfo)));
        }
        exit(json_encode(array('status'=>1,'msg'=>'邮件已发送，请查收')));
      }else{
        exit(json_encode(array('status'=>-1,'msg'=>'用户名和邮箱不匹配')));
      }
    }else{
      $this->display();
    }
  }


  /**
   *用户重置密码
   */
  public function changePw(){

    $code=trim($_GET['code']);
    $info=base64_decode($code); //echo $info;die;
    $infoArr=explode("||", $info);

    $re=M()->table('think_user')->where("account='".$infoArr[0]."' and email='".$infoArr[1]."'")->find();
    // print_r($re);die;
    if(!$re['account']){
      header('Content-Type: text/html; charset=UTF-8');
      echo "链接失效，请返回上一步操作";die;
    }
    $this->assign('name',$re['account']);
    $this->display();
  }

  /**
   *修改密码
   */
  public function changePassword(){

    $account=trim($_REQUEST['name']);
    $password=trim($_REQUEST['password']);
    $re=M()->table("think_user")->where("account='".$account."'")->save(array('account'=>$account,'password'=>md5("wprc123".$password)));
    if($re){
      exit(json_encode(array('status'=>1,'msg'=>'操作成功')));
    }else{
      exit(json_encode(array('status'=>-1,'msg'=>'操作失败')));
    }
  }

  public function introduce(){

    $this->display();
  }

  /**
   *查看用户资料
   */
  public function userIntro(){

    if(!$this->isLogin){  //检测登陆状态，未登录，返回登陆页
      header("location:login");
    }
    $userId=intval($_GET['uid']);    //获取用户id
    $userInfo=$this->getUserInfo();
    $myId=$userInfo['id'];    //自己的ID
    if($myId==$userId){
      header("location:index");
    }
    $guanzhu=M()->table("think_follow")->where("uid=".$userId." and flollow_id=".$myId)->find();
    $guanzhu=empty($guanzhu)?0:1;

    $model=D("User");
    $userInfo=$model->showUserInfo($userId);    //用户资料

    $rmodel=D("Review");
    $list=$rmodel->getUserReview($userId,0,5);   //用户发布的网评
    $num=count($list);  //print_r($list);die;
    // if($_GET['act']=='list'){}
    $this->assign('guanzhu',$guanzhu);   //是否关注
    $this->assign('userInfo',$userInfo);
    $this->assign('num',$num);
    $this->assign('list',$list);

    $this->display();
  }


  /*
   *用户详细资料
   */
  public function showUserInfo(){

    $userId=intval($_GET['uid']);
    $model=D("User");
    $userInfoAll=$model->getUserInfoAll($userId);
    $this->assign('userInfo',$userInfoAll);
    $this->display();
  }

  /**
   *  私信对话框
   */
  public function message(){
    if($this->isMobile==0){
      $this->assign('act','message');
    }

    $userInfo=$this->getUserInfo();
    $myId=$userInfo['id'];    //自己的ID
    $uid=intval($_REQUEST['id']);    //对方的ID号

    $m=D("User");
    $m->xinxiRead($uid,$myId); //将消息标为已读
    $myInfo=$m->getUserInfoAll($myId);  //自己的资料
    $uInfo=$m->getUserInfoAll($uid); //对方的资料
    $result=$m->getMessage($myId,$uid,0,10);

    foreach($result as $k=>$v){   //对数组进行整理
      if($k==0||date("Ymd",$result[$k]['time'])!=date("Ymd",$result[$k-1]['time'])){
        $result[$k]['add']=1;
      }
      if($v['sendId']==$myId){
        $result[$k]['type']='send';
      }else{
        $result[$k]['type']='save';
      }
    }

    $this->assign('myInfo',$myInfo);
    $this->assign('uid',$uid);
    $this->assign('list',$result);
    $this->assign('uInfo',$uInfo);
    $this->display();
  }


  /**
   *发送私信
   */
  public function sendMessage(){

    $sendId=intval($_REQUEST['sendId']);
    $saveId=intval($_REQUEST['saveId']);
    
    $data=array(
      'sendId'=>$sendId,
      'saveId'=>$saveId,
      'time'=>time(),
      'content'=>addslashes(trim($_REQUEST['content']))
    );
    $res=M()->table("think_xinxi")->add($data);
    if($res){
      exit(json_encode(array('status'=>1)));
    }else{
      exit(json_encode(array('status'=>-1)));
    }
  }


  /**
   * 清空聊天信息
   */
  public function toEmpty(){

    $myId=intval($_POST['sendId']);
    $uId=intval($_POST['saveId']);
    $m=D('User');
    $res=$m->dropMessage($uId,$myId);
    if($res){
      exit(json_encode(array('status'=>1)));
    }else{
      exit(json_encode(array('status'=>0)));
    }
  }


  /**
   *  私信箱   
   */
  public function messageBox(){
    if($this->isMobile==0){
      $this->assign('act','message');
    }
    
    $userInfo=$this->getUserInfo();
    $myId=$userInfo['id'];    //自己的ID

    $m=D("User");
    $result=$m->getMessageBox($myId);

    $this->assign('list',$result);
    $this->display();
  }


}