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
    public function add($data)
    {
    	$data['status'] = 0;
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
            // print_r($this->getLastSql());exit;
        }
        return $this->where('status','neq',0)
                    ->paginate();
    }
}
