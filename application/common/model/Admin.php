<?php

namespace app\common\model;

use think\Model;

class Admin extends Model
{
	/**
	 * 通过名字获取管理员
	 */
    public function getAdminByName($where = [])
    {
    	$where['status'] = ['neq',0];
    	return $this->where($where)
    				->find();
    }
    /**
     * 添加管理员
     */
    public function add($data,$status = 0)
    {
    	$data['status'] = $status;
    	return $this->allowField(true)
    				->save($data);
    }
    /**
     * 获取所有的管理员
     */
    public function getAllAdmin($key)
    {
        if($key)
        {
            //复合查询
            $con['id'] = ['like',"%{$key}%"];
            $con['username'] = ['like',"%{$key}%"];
            $con['nickname'] = ['like',"%{$key}%"];
            $con['email'] = ['like',"%{$key}%"];
            $con['_logic'] = 'OR';
            $where['_complex'] = $con;
            return $this->whereOr('id','like',"%{$key}%")
                        ->whereOr('username','like',"%{$key}%")
                        ->whereOr('email','like',"%{$key}%")
                        ->where('status','neq',0)
                        ->paginate();
        }
        return $this->where('status','neq',0)
                    ->paginate();
    }
    /**
     * 通过状态获取管理员
     */
    public function getAdminByStatus($status = 0)
    {
        $data['status'] = $status;
        $order['id'] = 'asc';
        return $this->where($data)
                    ->order($order)
                    ->paginate(); 
    }
    /**
     * 修改管理员状态
     */
    public function updateAdminStatus()
    {
        $data = input('get.');
        return $this->save(['status' => $data['status']],['id' => $data['id']]);
    }
}
