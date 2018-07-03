<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;


class Experience extends Base
{
	public function getSimpleExperience($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
}
