<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    protected $menu = null;//目录菜单
    public $account;
    public $admin;
    public $role;
    public $rule;
    /**
     * 基类初始化
     */
    public function _initialize()
    {
        $this->menu = config('menu.menu');
        $this->admin = model('Admin');
        $this->assign('menu',$this->menu);
        $this->isLogin();
        $this->checkRule();

    }
    /**
     *权限检查
     */
    public function checkRule()
    {
        $adminAcount = $this->getLoginUser();
        $this->assign('adminId',$adminAcount->id);
        if (request()->module() == 'Admin' && request()->controller() == 'Admin' && request()->action() == 'logout') 
        {
            return true;
        }
        if (session("rules")!='*' && !in_array(request()->controller().'/'.request()->action(),session('rules'))) 
        {
             if (request()->isAjax()) {
                 return error('没有权限访问该功能',config('json.commonError'),10000);
             }else {
                 $this->error('没有权限访问该功能！');
             }

        }        
    }
    /**
     * 判断是否登录
     */
    public function isLogin()
    {
        $user = $this->getLoginUser();
        if(empty($user))
        {
            return $this->redirect(url('Login/index'));
        }
        if(!$user && !$user->id)
        {
            return $this->redirect(url('Login/index'));
        }
    }
    /**
     * 获取当前登录用户
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
