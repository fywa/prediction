<?php
namespace app\admin\controller;
class Admin extends Base
{
	public $obj;
	public function _initialize()
	{
	    parent::_initialize();
		$this->obj = model('Admin');
	}
	public function index()
	{
		$keywords = input('get.keywords');
		$list = $this->obj->getAllAdmin($keywords);
		return $this->fetch('',[
			'title' => '管理员列表',
			'list' => $list,
			'key' => $keywords == '' ?'请输入关键词':$keywords,
		]);
	}
	/**
	 * 添加管理员
	 */
	public function add()
	{
		if(request()->isPost())
		{
			(validate('Admin')->doCheck('add'));
			$data = input('post.');
			if($data['password'] != $data['repassword'])
			{
				return error('两次密码不一样，请检查',config('json.commonError'),10061);
			}
			$data['salt'] = code();
			$data['password'] = MD5(MD5($data['password'].'QianWen').$data['salt']);
			$res = $this->obj->add($data,1);
			if($res)
			{
				return success('添加成功');
			}
			return error('添加失败',config('json.serverError'),10062);			
		}
		return $this->fetch('',[
			'title' => '添加管理员'
		]);


	}
	/**
	 *退出登录
	 * */
	public function logOut()
	{
		session('adminAccount', null);
		return $this->redirect(url('Login/index'));
	}

}