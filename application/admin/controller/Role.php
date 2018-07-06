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
        parent::_initialize();
        $this->obj = model('Role');
    }
    /**
     * 角色列表
     */
    public function index()
    {
        $co = input('get.status',1);
        $list = $this->obj->getAllList(['status' => $co]);
        $this->assign([
            'title' => '角色列表',
            'list' => $list,
            'status' => config('status.status'),
            'co' => $co
        ]);
        return $this->fetch();
    }
}
