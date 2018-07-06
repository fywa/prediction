<?php
/**
 * @author xiaodong
 * @date(2018 .7.3 10:08)
 */

namespace app\api\controller\v1;
use app\api\service\MathLib;
use app\api\service\Token;
/**
 * 排行榜接口
 */
class Top extends Base
{
	/**
	 * 查看限值条数的排行榜
	 * @num 显示条数
	 */
	public function getSimpleTop($num = 2)
	{
		$list = $this->obj->getSimpleList($num)->toArray();
		$all = $this->obj->getSimpleList(0)->toArray();
		//统计中位数
		$list['median'] = MathLib::getInstance()->getMedian($all,'avg_score');
		$list['user'] = $this->obj->getListByUserId(Token::getCurrentUid());
		return success('',$list);
	}
}
