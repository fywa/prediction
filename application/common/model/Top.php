<?php
/**
 * @author xiaodong
 * @date(2018.7.30 10:20)
 */
namespace app\common\model;

/**
 * 排行榜
 */
class Top extends BaseModel
{
	protected $hidden = ['create_time','update_time','status'];
	public function getSimpleList($num = 2)
	{
		return $this->withCount('userprediction', self::$normal)
					->with('user',self::$normal)
					->where(self::$normal)
					->order('avg_score','asc')
					->limit($num)
					->select();
	}
    /**
     * 关联用户表关注人数
     */
    public function user()
    {
        return $this->belongsTo('User','user_id','id');
    }
    /**
     *通过uid获取list
     */
    public function getListByUserId($id ,$where = [] , $limit = 0)
    {
        return $this->where('status' , 1)
                    ->withCount('userprediction',self::$normal)
                    ->with('user')
                    ->where($where)
                    ->where('user_id',$id)
                    ->limit($limit)
                    ->find();
    }



}
