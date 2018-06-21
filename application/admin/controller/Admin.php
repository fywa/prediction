<?php
namespace app\admin\controller;
class Admin extends Base
{
	public function index()
	{
		return $this->fetch();
	}

}