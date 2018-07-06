<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class Question extends Base
{
	/**
	 *获取固定条数的问题
	 */
	public function getSimpleQuestion($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
	public function getQuestionById($id)
	{
		$list = $this->obj->getListById($id);
		return success('',$list);
	}
}
