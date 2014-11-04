<?php
/**
 * 后台用户控制器
 * @author  
 */

 class GuestController extends AdminController{
    /**
     * 用户管理首页
     * @author 
     */
    public function index(){
    	$User = D('User');
        $account = trim(I('get.account'));
        if($account)
            $where['account'] = array('like',"%{$account}%");
            $where['name'] = array('like',"%{$account}%");
            $where['_logic'] = "OR";
        $count=$User->where("account!=''")->count();
    	$User = $User->alias('U')->join('LEFT JOIN __USER_INFO__ as UI  on U.id=UI.uid')->where($where)->field(array('U.id','U.account','U.email','U.name','UI.sex','UI.ip','UI.time','UI.status'))->select();
    	foreach ($User as $key=>$val) {
    		if($val['sex'] == 0){
    			$User[$key]['sex_text'] = "女";
    		}else{
    			$User[$key]['sex_text'] = "男";
    		}
    	}
        foreach ($User as $key => $value) {
            $autocomplete .= "'".$value['name']."',";
        }
        $autocomplete = '['.substr($autocomplete, -0,-1).']';
    	int_to_string($User);

        $this->assign('count',$count);
        $this->assign('autocomplete',$autocomplete);
    	$this->assign('user',$User);
    	$this->meta_title = "用户列表";
    	$this->display();
    }

    /**
     * 用户状态更改
     * @author 
     */
    public function changeStatus($method=null){
    	$id = array_unique((array)I('id'));
    	$id = is_array($id) ? implode(',',$id) :$id;
    	if(empty($id)){
    		$this->error('请选择要操作的数据！');
    	}
    	$map['id'] = array('in',$id);
    	switch(strtolower($method)){
    		case 'forbid':
    			$this->forbid('UserInfo',$map);
    			break;
    		case 'resume':
    			$this->resume('UserInfo',$map);
    			break;
    		case 'delete':
    			$this->delete('UserInfo',$map);
    			break;
    		default:
    			$this->error('参数非法！');
    	}
    }

    /**
     * 用户信息修改
     * @author 
     */
    public function edit(){
        if(IS_POST){

        }else{
        	$id = I('id');
        	$User = D('User')->alias('U')->join('LEFT JOIN __USER_INFO__ as UI on U.id=UI.uid')->where(array('u.id'=>$id))->find();
            if($User['sex']==0){
                $User['sex_text'] = "女";
            }else{
                $User['sex_text'] = "男";
            }
            $PC = array('p'=>$User['province'],'c'=>$User['city']);
        	$this->assign('info',$User);
            $this->assign('area',$this->getArea($PC));
            $this->meta_title = "用户信息修改";
        	$this->display();
        }

    }

    /**
     * 用户详细信息
     * @author 
     */
    public function detail(){
    	$id = I('id');
    	$User = D('User')->alias('U')->join('LEFT JOIN __USER_INFO__ as UI on U.id=UI.uid')->where(array('U.id'=>$id))->find();
        if($User['sex']==0){
            $User['sex_text'] = "男";
        }else{
            $User['sex_text'] = "女";
        }
        if($User['status']==1){
            $User['status_text'] = "启用";
        }else{
             $User['status_text'] = "禁用";
        }
        $this->meta_title = "用户详细信息";
        $this->assign('info',$User);
        $this->display();
    }

    /**
     * 修改用户密码
     * @author 
     */
    public function changePwd(){
        $id = I('id');
    }

    /**
     * 获取用户居住地信息
     * @author 
     */
    public function getArea($where=array('p'=>1,'c'=>1)){
        //echo $where;
        $Province = D('Province');
        $City = D('City');
        $District = D('District');
        $area['p'] = $Province->select();
        $area['c'] = $City->where(array('province_id'=>$where['p']))->select();
        $area['d'] = $District->where(array('city_id'=>$where['c']))->select();
        return $area;
    }


    /**
     * 获取省级信息
     * @author 
     */
    public function getProvince(){
        return $Province = D('Province')->select();
    }

    /**
     * 获取省下的城市
     * @author 
     */    
    public function getCity(){
        $City = D('City');
        $City = $City->where('province_id='.I('pv'))->select();
        $this->ajaxReturn($City);
    }

    /**
     * 获取城市的地区
     * @author 
     */   
    public function getDistrict(){
        $District = D('District');
        $District = $District->where('city_id='.I('ct'))->select();
        $this->ajaxReturn($District);
    }

    /**
     * 查找
     * @author 
     */  
    public function search(){

    }

    public function test(){
        $User = D('User')->alias('U')->join('__USER_INFO__ as UI on U.id=UI.uid','left')->join('__REPLY__ as r on U.id=R.uid','left')->select();
        print_r($User);
    }

 }