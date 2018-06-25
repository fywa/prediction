<?php
/**
 * @author xiaodong
 * @date(2018.6.25)
 */
namespace app\admin\controller;
use think\Controller;
class Login extends Controller
{
	private $admin;

	public function _initialize()
	{
		$this->admin = model('Admin');
	}
	public function index()
	{
		/**
		 * 用户登录逻辑
		 */
		if(request()->isPost())
		{
			(validate('Login')->doCheck());
	        $username = input('post.username');
	        $password = input('post.password');
	        $account = $this->admin->getAdminByName(['username' => $username]);
	        if(empty($account))
	        {
	        	return error('账户不存在,或已经被停用',404,10007);
	        }
	        if($account['password'] == MD5(MD5($password.'QianWen').$account['salt'])){
	        	//写入缓存里
	        	session('adminAccount', $account);
	        	/**
	        	 * 写入日志
	        	 */
	        	return success('登录成功');
	        }
		}		
		return $this->fetch('',[
			'title' => '预言家-登陆'
		]);

	}
}