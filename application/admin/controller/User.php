<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/6/27 0027
 * Time: 10:12
 */
namespace app\admin\controller;

class User extends Base
{
    public $obj;
    public function _initialize()
    {
        parent::_initialize();
        $this->obj = model('User');
    }
    /**
     * 规则列表
     */
    public function index()
    {
        $keywords = input('get.keywords');
        $where = [];
        if($keywords)
        {
            $where['username'] = ['like',"%{$keywords}%"];
        }
        $list = $this->obj->getAllList($where);
        $this->assign([
            'title' => '用户列表',
            'list' => $list,
            'keywords' => $keywords
        ]);
        return $this->fetch();
    }
    /**
     * 详细信息
    */
    public function detail()
    {
        if(empty(input('get.id')))
        {
            return $this->error('缺少id');
        }
        $list = $this->obj->getListById(input('get.id'));
        return $this->fetch('',[
            'list' => $list,
            'title' => '个人资料'
            ]
        );
    }


}