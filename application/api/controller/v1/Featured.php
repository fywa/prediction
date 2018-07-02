<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
class Featured extends Base
{
	/**
	 * 获取所有的banner图
	 */
	public function getAllBanner()
	{

		$list = $this->obj->getAllList(['status' => 1 ,'type' => 0]);
		return success('',$list);
	}
}