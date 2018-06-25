<?php
namespace app\admin\controller;
use think\Controller;
class Register extends Controller
{
	private $obj;
	public function _initialize()
	{
		$this->obj = model('admin');
	}
	public function index()
	{
		if(request()->isPost())
		{
			validate('Register')->doCheck();
		}
		return $this->fetch('',[
			'title' => '预言家-注册'
		]);
	}
}