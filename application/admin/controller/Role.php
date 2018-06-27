<?php
/**
 * @author xiaodong
 */
namespace app\admin\controller;


class Role extends Base
{
    public $obj;
    public function _initialize()
    {
        $this->obj = model('Role');
    }
    /**
     * 角色列表
     */
    public function index()
    {
        $co = input('get.status',1);
        $list = $this->obj->getAllRole($co);
        $this->assign([
            'title' => '角色列表',
            'list' => $list,
            'status' => config('status.status'),
            'co' => $co
        ]);
        return $this->fetch();
    }
    /**
     * 更新状态
     */
    public function status()
    {
        (validate('Role')->doCheck('status'));
        $res = $this->obj->updateRoleStatus();
        if(!$res)
        {
            return error('操作失败',config('json.serverError'),20081);
        }
        return success('操作成功');        
    }
}
