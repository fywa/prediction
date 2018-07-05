<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class Suggestion extends Base
{
	/**
	 * 反馈意见
	 */
	public function addSuggestion()
	{
		validate('Suggestion')->doCheck('doadd');
		$res = $this->obj->add();
		if(!$res)
		{
			return error('提交失败',config('json.commonError'),10600);
		}
		return success('提交成功');
	}
}