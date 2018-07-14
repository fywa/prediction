<?php
/**
 * @author xiaodong
 * @date(2018.7.4 17:32)
 */
namespace app\admin\controller;


class Course extends Base
{
    public $obj;
    public function _initialize()
    {
        parent::_initialize();
        $this->obj = model(request()->controller());
    }
    /**
     * 常见问题
     */
    public function index()
    {
        $co = input('get.status',1);
        $list = $this->obj->getAllListByAdmin(['status' => $co]);
        $this->assign([
            'title' => '预言家课堂',
            'list' => $list,
            'status' => config('status.status'),
            'co' => $co
        ]);
        return $this->fetch();
    }
}
