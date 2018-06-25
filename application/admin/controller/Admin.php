<?php
namespace app\admin\controller;
class Admin extends Base
{
	public $obj;
	public function _initialize()
	{
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
	 *退出登录
	 * */
	public function logOut()
	{
		session('adminAccount', null);
		return $this->redirect(url('Login/index'));
	}

}