<?php

namespace app\common\model;

use think\Model;

class Admin extends Model
{
    public function getAdminByName($where = [])
    {
    	$where['status'] = ['neq',1];
    	return $this->where($where)
    				->find();
    }
}
