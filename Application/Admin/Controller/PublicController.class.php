<?php
// +----------------------------------------------------------------------
// | OneThink [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2013 http://www.onethink.cn All rights reserved.
// +----------------------------------------------------------------------
// | Author: datahome改写 <datahome@qq.com>  2014-2-25
// +----------------------------------------------------------------------
 

/**
 * 后台登录页控制器
 * @author datahome改写 <datahome@qq.com>
 */
class PublicController extends \Think\Controller {

    /**
     * 后台用户登录
     * @author datahome改写 <datahome@qq.com>
     */
    public function login($username = null, $password = null, $verify = null){
        if(IS_POST){
            // 检测验证码 
            if(!check_verify($verify)){
                $this->error('验证码输入错误！');
            } 
            
            //调用 Member 模型的 login 方法，验证用户名、密码
            $Member = D('Member');
            $uid = $Member->login($username, $password);            
            
            if(0 < $uid){ // 登录成功，$uid 为登录的 UID
                //跳转到登录前页面
                $this->success('登录成功！', U('Index/index'));
            } else { //登录失败
                switch($uid) {
                    case -1: $error = '用户不存在或被禁用！'; break; //系统级别禁用
                    case -2: $error = '密码错误！'; break;
                    default: $error = '未知错误！'; break; // 0-接口参数错误（调试阶段使用）
                }
                $this->error($error);
            }
        } else {
            if(is_login()){
                $this->redirect('Index/index');
            }else{
                /* 读取数据库中的配置 */
                $config	=	S('DB_CONFIG_DATA');
                if(!$config){
                    $config	=	D('Config')->lists();
                    S('DB_CONFIG_DATA',$config);
                }
                C($config); //添加配置
                
                $this->display();
            }
        }
    }

    //退出登录 ,清除 session
    public function logout(){
        if(is_login()){
            D('Member')->logout();
            session('[destroy]');
            $this->success('退出成功！', U('login'));
        } else {
            $this->redirect('login');
        }
    }

    //生成 验证码
    public function verify(){
        $verify = new \Think\Verify();
        $verify->entry(1);
    }

}
