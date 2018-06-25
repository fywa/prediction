<?php

namespace app\common\model;

use think\Model;

class Role extends Model
{
    public function getRoleById($id, $where = [])
    {
    	$where['status'] = 1;
    	return $this->get($id);
    }
}
