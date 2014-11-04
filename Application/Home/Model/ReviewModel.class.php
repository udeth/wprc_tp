<?php
namespace Home\Model;
use Think\Model;

/**
 * 网评模型
 */

class ReviewModel extends Model {

	public function __construct($table){

		$this->tableName=$table;
		parent::__construct();
	}

	/**
	 *获取网评列表
	 *@param $where
	 *@param sort
	 *@param limit
	 */
	public function getReviewList($where,$sort,$limit){
		
		$sql="select r.*,p.name from think_review as r left join think_product_category as p on r.product_category_id=p.id where ".$where." and r.checked=1 order by ".$sort." limit ".$limit;
		// echo $sql;die;///return $sql;
		$arr=M()->query($sql);//print_r($arr);die;
		foreach($arr as $k=>$v){
			$sql="select `thumb_img` from think_review_img where rid=".$v['id'];
			$imgArr=M()->query($sql);
			if($v['image']){
	          $imgArr[]=array('thumb_img'=>toThumbImg($v['image']));
	        }
			$arr[$k]['image']=$imgArr;
		}
		return $arr;
	}

	/**
	 *获取网评详情
	 *@param  $id int 网评ID
	 *@param  $ofset int 
	 *@param  $limit int 
	 */
	public function getReviewInfo($id,$ofset,$limit){

		$data=array();
		
		$sql1="select think_user_info.*,think_review.*,think_product_category.name as pname,think_user.* from think_review inner join think_product_category on think_review.product_category_id=think_product_category.id inner join think_user on think_review.uid=think_user.id inner join think_user_info on think_review.uid=think_user_info.uid where think_review.id=".$id." and think_review.checked=1 limit 1";
		$wangping=M()->query($sql1);//echo M()->getLastSql();die;
		$data['wangping']=$wangping[0]; //print_r($data);die;
		$sql2="select think_reply.*,think_user.name,think_user_info.image from think_reply inner join think_user on think_reply.uid=think_user.id inner join think_user_info on think_reply.uid=think_user_info.uid where think_reply.rid=".$id." and think_reply.pid=0 order by think_reply.time asc limit ".$ofset.",".$limit;
		$pinglun=M()->query($sql2);  //获取评论数据
		$idArr=array();
		foreach($pinglun as $k=>$v){
			$idArr[]=$v['id'];
		}
		$idString=implode(",", $idArr);
		$sql3="select think_reply.*,think_user.name,think_user_info.image from think_reply inner join think_user on think_reply.uid=think_user.id inner join think_user_info on think_reply.uid=think_user_info.uid where think_reply.rid=".$id." and think_reply.pid in (".$idString.") order by think_reply.time asc";
		$huifu=M()->query($sql3);  //获取回复的评论数据 
		$list=array();
		foreach($pinglun as $k=>$v){
				$list[$v['id']]=$v;
		}
		foreach($huifu as $k=>$v){
				$msql="select name as `rename` from think_user where id=".$v['reuid'];
				$rename=M()->query($msql);
				$rename=$rename[0]['rename'];
				$v['rename']=$rename;
				$list[$v['pid']]['list'][]=$v;
		}
		$data['pinglun']=$list;
		$imgArr=M()->table("think_review_img")->where('rid='.$id)->select();
		$data['wangping']['imgArr'][]=toThumbImg($data['wangping']['image']);
		$data['wangping']['bigImgArr'][]=$data['wangping']['image'];
		foreach($imgArr as $k=>$v){
			$data['wangping']['imgArr'][]=$v['thumb_img'];
			$data['wangping']['bigImgArr'][]=$v['image'];
		}
		
		// print_r($data);die;
		return $data;
	}


	/**
	 *根据用户ID查询用户所有发布的网评
	 */
	public function getUserReview($uid,$start,$limit){

		$sql="select * from think_review where uid=".$uid." and checked=1 order by time desc limit ".$start.",".$limit;
		$list=M()->query($sql);    //用户发表的网评列表
		$sql="select thumb_img,rid from think_review_img where rid in (select * from (select id from think_review where uid=".$uid." and checked=1 order by time desc limit ".$start.",".$limit.") as t)";
		$imgArr=M()->query($sql);//print_r($imgArr);die;
		foreach($list as $k=>$v){
			$list[$k]['image']=array();
			foreach($imgArr as $key=>$val){
				if($v['id']==$val['rid']){
					if(!empty($v['image'])){
						$list[$k]['image'][]=toThumbImg($v['image']);
						unset($v['image']);
					}
					$list[$k]['image'][]=$val['thumb_img'];
				}
			}
		}
		return $list;
	}

	
}





?>