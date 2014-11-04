<?php
namespace Home\Model;
use Think\Model;

/**
 * 用户模型
 */

class UserModel extends Model {

	public function __construct($table){

		$this->tableName=$table;
		parent::__construct();
	}

	public function test1(){

		return 'aaaaabbbbb';
	}

	/**
	 *获取用户信息
	 *@param $userName
	 */
	public function getUserInfo($userName){
		$where=" `account`='".$userName."'";
		return $this->where($where)->find();
	}

	/**
	 *获取用户全部信息
	 *@param $userId int
	 *@return $result array
	 */
	public function getUserInfoAll($userId){

		$model=M();
		$sql="select * from think_user as u left join think_user_info as i on u.id=i.uid where u.id=".$userId;
		$result=$model->query($sql);
		return $result;
	}

	/**
	 *更新用户资料
	 *@param $userId  int 用户id
	 *@param $data  array 更新的数据
	 *@return boolen
	 */
	public function changeInfo($userId,$data){

		$model=M();
		$data1=array();
		$data1['name']=$data['name'];
		unset($data['name']);
		$result1=$this->where('id='.$id)->update($data1);
		$result2=M()->table('user')->where('uid='.$id)->update($data);
		if($result1 && $result2){
			return true;
		}else{
			return false;
		}
	}

	/**
	 *获取用户的关注列表
	 *@param $userId int
	 *@return arr
	 */
	public function getFllowList($userId,$star,$end,$onId=false){

		if(!$onId){
			$result=M()->table("think_follow as f")->join("think_user as u on f.uid=u.id")->join("think_user_info as i on f.uid=i.uid")->where('f.flollow_id='.$userId)->limit($star,$end)->select();
			// echo M()->getLastSql();die;
		}else{
			$result=M()->table("think_follow")->where('flollow_id='.$userId)->getField('uid',true);
		} //echo M()->getLastSql();die;
		return $result;
	}

	/**
	 *获取用户的粉丝列表
	 *@param $userId  int
	 *@return arr
	 */
	public function getbFllowList($userId,$star,$end){

		$result=M()->table("think_follow as f")->join("think_user as u on f.flollow_id=u.id")->join("think_user_info as i on f.flollow_id=i.uid")->where('f.uid='.$userId)->limit($star,$end)->select();
		// echo M()->getLastSql();die;
		return $result;
	}


	/**
	 *查看用户资料
	 */
	public function showUserInfo($id){

		$sql="select * from think_user as u left join think_user_info as i on u.id=i.uid where u.id=".$id;
		$userInfo=M()->query($sql);  //
		return $userInfo;
	}

	/**
	 * 查询聊天信息
	 *@param sendId  int
	 *@param saveId  int
	 *@param page  int 
	 *@param count int
	 *@return result array
	 */
	public function getMessage($sendId,$saveId,$page=0,$count=10){

		$where=" (`sendId`=$sendId and `saveId`=$saveId) or (`sendId`=$saveId and `saveId`=$sendId) ";
		$result=M()->table("think_xinxi")->where($where)->order("time desc")->limit($page.",".$count)->select();
		// echo M()->getLastSql();die;
		return $result;
	}

	/**
	 *获取私信列表
	 *@param uid int 用户ID 
	 *@return result array  私信列表
	 */
	public function getMessageBox($uid){

		$sql="select DISTINCT x.time,x.sendId,x.saveId,x.content,u.image,n.image as iimage,y.name,f.name as uname from (select * from think_xinxi order by time desc) as x LEFT JOIN think_user_info as u on x.sendId=u.uid LEFT JOIN think_user_info as n on x.saveId=n.uid left join think_user as y on x.sendId=y.id left join think_user as f on x.saveId=f.id where x.sendId=".$uid." or x.saveId=".$uid." GROUP BY x.sendId,x.saveId ORDER BY x.time desc";
		$result1=M()->query($sql);//echo M()->getLastSql();die;
		// print_r($result1);die;
		$idArr=array();
		foreach($result1 as $k=>$v){
			if($v['sendId']==$uid){
				$result1[$k]['image']=$v['iimage'];
				$result1[$k]['name']=$v['uname'];
				unset($result1[$k]['iimage']);
				unset($result1[$k]['uname']);
				if(in_array($v['saveId'], $idArr)){
					unset($result1[$k]);
				}else{
					$idArr[]=$v['saveId'];
					$result1[$k]['id']=$v['saveId'];
					unset($result1[$k]['saveId']);
					unset($result1[$k]['sendId']);
				}
			}elseif($v['saveId']==$uid){
				unset($result1[$k]['iimage']);
				unset($result1[$k]['uname']);
				if(in_array($v['sendId'], $idArr)){
					unset($result1[$k]);
				}else{
					$idArr[]=$v['sendId'];
					$result1[$k]['id']=$v['sendId'];
					unset($result1[$k]['saveId']);
					unset($result1[$k]['sendId']);
				}
			}
		} 
		$sql="select sendId,count(*) as num from think_xinxi where saveId=".$uid." and isRead=0 group by sendId";
		$result2=M()->query($sql);
		foreach($result1 as $k=>$v){
			foreach($result2 as $key=>$val){
				if($v['id']==$val['sendId']){
					$result1[$k]['num']=$val['num'];
				}
			}
		}
		// print_r($result1);die;
		return $result1; 
	 }

	 /**
	  *  稽查用户积分是否足够支付
	  */
	 public function checkScore($userId,$score){

	 	$res=M()->table('think_user_info')->where('uid='.$userId)->find();
	 	if($res['score']<$score){
	 		return false;
	 	}
	 	return true;
	 }


	 /**
	  * 将消息标为已读
	  */
	 public function xinxiRead($sendId,$saveId){

	 	M()->table('think_xinxi')->where('sendId='.$sendId." and saveId=".$saveId)->save(array('isRead'=>1));
	 }


	 /**
	  *清空对话消息
	  *@param $uid  int 用户ID1
	  *@param $myid int  用户id2
	  *@return result  boolen 
	  */
	 public function dropMessage($uid,$myid){

	 	$sql="delete from think_xinxi where (sendId =".$uid." and saveId=".$myid.") or (sendId=".$myid." and saveId=".$uid.")";
	 	$result=M()->execute($sql);
	 	return $result;
	 }

	
}





?>