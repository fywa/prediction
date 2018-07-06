<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use think\Controller;
class Index extends Controller
{
	public function index()
	{
		$arr = ['asdfa','asdfa','asdfa'];
		print_r(implode(',',$arr));
		print_r(explode(',',implode(',',$arr)));

	}
}