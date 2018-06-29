<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;


class Prediction extends BaseModel
{
	/**
	 * 关联用户表数据
	 */
	public function predictions()
	{
		return $this->belongsTo('User','user_id','id')->bind('username');
	}
    
    public function getAllList($where = [])
    {
    	return $this->with('predictions')->where($where)->paginate();

    }
}
