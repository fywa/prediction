<?php
/**
 * @author xiaodong
 * @date(2018 .7.3 10:08)
 */

namespace app\api\controller\v1;
use app\api\service\MathLib;
/**
 * 排行榜接口
 */
class Top extends Base
{
	public function getSimpleTop($num = 2)
	{
		$list = $this->obj->getSimpleList($num)->toArray();
		//统计中位数
		$list['median'] = MathLib::getInstance()->getMedian($list,'avg_score');
		return success('',$list);
	}
}
