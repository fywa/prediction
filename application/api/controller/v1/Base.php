<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;

use think\Controller;
use app\api\service\Token;
class Base extends Controller
{
	public $obj = null;
	public function _initialize()
	{
	    $this->obj = model(explode('.',request()->controller())[1]);
	}
	/**
	 * [checkPrimaryScope 检查权限]
	 * @return [type] [api]
	 */
	protected function checkPrimaryScope(){
		Token::needPrimaryScope();
	}
	protected function checkExclusiveScope(){
		Token::needExclusiveScope();
	}	
}
