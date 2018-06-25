<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    protected $menu = null;//目录菜单
    private $account;
    /**
     * [基类初始化]
     * @return [type] [description]
     */
    public function _initialize()
    {
        $this->menu = config('menu.menu');
        $this->assign('menu',$this->menu);
        //判断用户是否登录
        $isLogin = $this->isLogin();
        if(!$isLogin)
        {
            return $this->redirect(url('Login/index'));
        }
    }
    /**
     * 判断是否登录
     */
    public function isLogin()
    {
        $user = $this->getLoginUser();
        if($user && $user->id)
        {
            return true;
        }
        return false;
    }
    /**
     * 获取当前登录用户
     * @return [type] [description]
     */
    public function getLoginUser()
    {
        if(!$this->account)
        {
            $this->account = session('adminAccount');
        }
        return $this->account;

    }
}
