<?php
namespace app\admin\controller;
class Index extends Base
{
	public function index()
	{
		return $this->fetch('',[
			'title' => '首页'
		]);
	}
	public function main()
	{
		return $this->fetch('',[
			'title' => '首页'
		]);
	}

}