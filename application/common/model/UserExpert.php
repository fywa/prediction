<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;


class UserExpert extends BaseModel
{
    public function getAllList($where = [])
    {
    	return $this->with('user')->where($where)->paginate();

    }
}
