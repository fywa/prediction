<?php
/**
 * @author xiaodong <[<email address>]>
 * @date(2018.6.28 11:25)
 */
namespace app\admin\controller;

use think\Controller;
use think\Request;

class Featured extends Base
{
    private $obj = null;

    public function _initialize()
    {
        parent::_initialize();
        $this->obj = model('Featured');
    }
    /**
     * 推荐位列表
     */
    public function index()
    {
        $co = input('get.type',0);
        $list = $this->obj->getAllListByAdmin(['type' => $co]);
        $this->assign([
            'title' => '推荐位列表',
            'list' => $list,
            'type' => config('status.type'),
            'co' => $co
        ]);
        return $this->fetch();
    }

}

