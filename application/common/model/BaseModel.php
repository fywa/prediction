<?php
/**
 * @author xiaodong
 */
namespace app\common\model;

use think\Model;

class BaseModel extends Model
{
    /**
     * 修改状态
     */
    public function updateStatus()
    {
        $data = input('get.');
        return $this->save(['status' => $data['status']],['id' => $data['id']]);
    }
    /**
     * 根据id查询
     */
    public function getListById($id = 0)
    {
        $where['status'] = 1;
        return $this->where($where)->find($id);
    }
    /**
     * 更新
     */
    public function doEdit()
    {
        $data = input('post.');
        $id = $data['id'];
        unset($data['id']);
        return $this->allowField(true)->save($data,['id' => $id]);
    }
    /**
     * 删除
     */
    public function doDel()
    {
        $id = input('get.id');
        return $this->destroy($id);
    }
    /**
     * 添加
     */
    public function doAdd()
    {
        $data = input('post.');
        $data['status'] = 0;
        return $this->allowField(true)->save($data);
    }
}
