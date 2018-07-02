<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;

use think\Controller;

class Base extends Controller
{
	public $obj = null;
	public function _initialize()
	{
	    $this->obj = model(explode('.',request()->controller())[1]);
	}
}
