<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;

/**
 * 预测话题
 */
class Experience extends BaseModel
{
	protected $hidden = ['create_time','update_time','status'];
	public function getSimpleList($num)
	{
		return $this->where(self::$normal)->limit($num)->select();
	}
}
