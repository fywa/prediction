<?php

namespace app\admin\controller;

use think\Controller;

class Base extends Controller
{
    protected $menu = null;//目录菜单
    public $account;
    public $admin;
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
        if (request()->controller() == 'Admin' && request()->action() == 'logout')
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
    /**
     * 更新状态
     */
    public function status()
    {
        (validate(request()->controller())->doCheck('status'));
        $res = model(request()->controller())->updateStatus();
        if(!$res)
        {
            return error('操作失败',config('json.serverError'),20081);
        }
        return success('操作成功');
    }

    /**
     * 编辑
     */
    public function edit()
    {
        //post 逻辑
        if(request()->isPost())
        {
            validate(request()->controller())->doCheck('edit');
            $res = model(request()->controller())->doEdit();
            if($res)
            {
               return success('更新成功');
            }
            return error('更新失败',config('json.commonError'),10021);
        }
        $id = input('get.id');
        if(empty($id))
        {
            $this->error('缺少id');
        }
        $list = model(request()->controller())->getListByIdFromAdmin($id);
        return $this->fetch('',[
            'title' => '编辑',
            'list' => $list
        ]);
    }
    /**
     * 添加
     */
    public function add()
    {
        //post 逻辑
        if(request()->isPost())
        {
            validate(request()->controller())->doCheck('add');
            $res = model(request()->controller())->doAdd();
            if($res)
            {
                return success('添加成功');
            }
            return error('添加失败',config('json.commonError'),10022);
        }
        $list = model(request()->controller())->getAddData();
        return $this->fetch('',[
            'title' => '添加',
            'list' => $list
        ]);
    }
    /**
     * 更新状态
     */
    public function del()
    {
        (validate(request()->controller())->doCheck('del'));
        $res = model(request()->controller())->doDel();
        if(!$res)
        {
            return error('操作失败',config('json.serverError'),20081);
        }
        return success('操作成功');
    }
    /**
     * 审核申请
     */
    public function apply()
    {
        $list = model(request()->controller())->getAllList(['status' => 0]);
        return $this->fetch('',[
            'title' => '审核申请',
            'list' => $list
        ]);
    }    
}
