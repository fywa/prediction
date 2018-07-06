<?php
/**
 * @author xiaodong
 * @date(2018 .7.4 10:22)
 */

namespace app\api\controller\v1;
use app\api\service\MathLib;
use app\api\service\Token;
/**
 * 用户接口
 */
class User extends Base
{
	/**
	 * 访问他人的资料
	 */
	public function getListById($userid)
	{
		$list = $this->obj->getListById($userid);
		return success('',$list);
	}
	/**
	 * 个人中心
	 */
	public function getPersonalCenter()
	{
		$list = $this->obj->getListById(Token::getCurrentUid());
		return success('',$list);
	}
	/**
	 * 编辑个人中心
	 */
	public function editPersonalCenter()
	{
		(validate('User')->doCheck('doedit'));
		$res = $this->obj->edit();
		if(!$res)
		{
			return error(config('json.errorEditMsg'),config('json.commonError'),10400);
		}
		return success(config('json.successEditMsg'));
	}
}
