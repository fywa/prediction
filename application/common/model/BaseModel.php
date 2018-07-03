<?php
/**
 * @author xiaodong
 */
namespace app\common\model;

use think\Model;

class BaseModel extends Model
{
    public static $normal = ['status' => 1];
    public static $pause = ['status' => 0];
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
    public function getListById($id)
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
    /**
     * 获取所有列表
    */
    public function getAllList($where = ['status' => 1],$order = ['id' => 'asc'])
    {
        return $this->where($where)
                    ->order($order)
                    ->paginate(); 
    }
    /**
     * 关联用户表数据
     */
    public function user()
    {
        return $this->belongsTo('User','user_id','id')->bind('username');
    }
    /**
     * 关联用户预测表数据
     */
    public function userprediction()
    {
        return $this->hasMany('UserPrediction','prediction_id','id');
    }    
    /**
     * 关联评论表数据
     */
    public function comment()
    {
        return $this->hasMany('Comment','foreign_id','id');
    }
    /**
     * 
     */
    public function getAllListRelateUser($where = [])
    {
        return $this->with('user')->where($where)->paginate();
    }
}
