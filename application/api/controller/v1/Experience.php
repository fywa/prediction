<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class Experience extends Base
{
	public function getSimpleExperience($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
	/**
	 * 查看个人的经验分享
	 */
	public function getPersonalExperience()
	{
		$list = $this->obj->getAllList(['status' => 1 ,'user_id' => Token::getCurrentUid()]);
		return success('',$list);
	}
	/**
	 * 查看个人的经验分享的详细信息
	 */
	public function getPersonalExperienceById($id)
	{
		$list = $this->obj->getListById($id);
		return success('',$list);
	}
}
