<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;


class UserPrediction extends Base
{

	public function answerPrediction()
	{
		validate('UserPrediction')->doCheck('answer');
		$res = model('UserPrediction')->add();
		if(!$res)
		{
			return error('提交失败',config('commonError'),10300);
		}
		return success('提交 成功');
	}
}
