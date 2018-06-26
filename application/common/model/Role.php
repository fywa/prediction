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
    /**
     *获取所有的角色
     */
    public function getAllRole($status = 1)
    {
    	$where['status'] = $status;
    	return $this->where($where)
    				->paginate();
    }
    /**
     * 修改角色状态
     */
    public function updateRoleStatus()
    {
        $data = input('get.');
        return $this->save(['status' => $data['status']],['id' => $data['id']]);
    }    
}
