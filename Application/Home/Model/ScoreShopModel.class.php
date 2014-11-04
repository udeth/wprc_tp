<?php
namespace Home\Model;
use Think\Model;
/**
 *积分商城模型
 */
class ScoreShopModel extends Model{

	public function __construct(){

		parent::__construct();
		$this->tableName=$table;
	}


	/**
	 *获取首页的列表
	 */
	public function getList($limit=6){

		$sql="select *,a.id as gid from think_score_shop as a left join think_zhuanqu as b on a.zhuanqu_id=b.id  where isDel=0";
		$list=M()->query($sql);

		$sql='select * from think_zhuanqu';
		$list2=M()->query($sql);
		foreach($list2 as $k=>$v){
			foreach($list as $key=>$val){
				if($v['id']==$val['zhuanqu_id'] && count($list2[$k]['arr'])<=6){
					$list2[$k]['arr'][]=$val;
				}
			}
		}
		return $list2;
		// print_r($list2);die;
	}

	/**
	 * 执行积分兑换
	 */
	public function getGoods($uid,$gid,$score){

		if(!$score){
			$res=M()->table('think_score_shop')->where('id='.$gid)->find();
			$score=$res['price'];
		}
		$res=M()->table('think_user_info')->where('uid='.$uid)->setDec("score",$score);
		
		if($res){
			return true;
		}else{
			return false;
		}
	}


	/*
	 *记录用户的兑换记录
	 */
	public function logShopHistory($array){

		$res=M()->table('think_shop_history')->add($array);
		if(!$res){
			return false;
		}
		return true;
	}



}



?>