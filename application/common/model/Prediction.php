<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;
use app\lib\enum\ScopeEnum;
/**
 * 预测话题
 */
class Prediction extends BaseModel
{
	protected $hidden = ['create_time','update_time','status'];
	public function getSimpleList($num)
	{
		return $this->withCount('userprediction')
					->where(self::$normal)->limit($num)->select();
	}
	public function getAllList($where = ['status' => 1],$order = ['id' => 'asc'])
	{
		return $this->withCount('comment')
					->where(self::$normal)->paginate();
	}
	public function getListById($id ,$usernum = 1)
	{
		return $this->with(['userprediction' => function($query)use ($usernum){
					$query->limit($usernum);
				}])
					->find($id);
	}
}
