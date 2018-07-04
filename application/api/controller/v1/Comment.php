<?php
/**
 * @author xiaodong
 * @date(2018 .7.4 15:20)
 */
namespace app\api\controller\v1;
use app\api\service\Token;
use app\common\enum\ScopeEnum;
class Comment extends Base
{
	public function commentExperience()
	{
		(validate('Comment')->doCheck('doadd'));
		$res = $this->obj->add(ScopeEnum::ExperienceComment);
		if(!$res)
		{
			return error('评论失败',config('json.serverError'),10501);
		}
		return success('评论成功');
	}
}
