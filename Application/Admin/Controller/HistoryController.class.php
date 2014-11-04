<?php

class HistoryController extends AdminController{
	
	public function index(){
		$history = D('ShopHistory')->alias('H')->join('__USER__ as U on H.uid=U.id','left')->join('__SCORE_SHOP__ as SS on H.goods_id=SS.id','left')->field('H.id,SS.shop_name,U.account,H.price,H.mobile,H.address,H.name,if(H.isSend=0,"未发","已发") issendStr,isSend')->select();
		$this->assign('history', $history);
		$this->meta_title = "兑换记录";
		$this->display();

	}

	public function edit(){
		$history = D('ShopHistory');
		$data = array(
			'id' => I('id'),
			'isSend' => 1
			);
		if($res = $history->save($data)){
			$info = $history->alias('H')->join('__SCORE_SHOP__ as SS on H.goods_id=ss.id','left')->field('H.uid,SS.shop_name')->where('H.id='.I('id'))->find();
			$xinxi = D('Xinxi');
			$data = array(
				'sendId' => 2,
				'saveId' => $info['uid'],
				'content' => $info['shop_name'] ,
				'time' => time(),
				'isRead' => 0
				);
			if($xinxi->create($data)){
				if($xinxi->add()){

				}else{

				}
			}else{

			}
			$this->success('已发货');
		}
	}

}