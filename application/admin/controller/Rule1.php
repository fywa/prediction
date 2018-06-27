<?php
/**
 * @author xiaodong
 * @date(2018.6.25 11:48)
 */
namespace app\admin\controller;

class Rule1 extends Base
{
    public $obj;
    public function _initialize()
    {
        $this->obj = model('Rule');
    }
    /**
     * 规则列表
     */
    public function index()
    {
        print_r("dsfsd");exit;
        $co = input('get.status',1);
        $list = $this->obj->getAllRule($co);
        $this->assign([
            'title' => '权限列表',
            'list' => $list,
            'status' => config('status.status'),
            'co' => $co
        ]);
        return $this->fetch();
    }
    /**
     * 添加规则
     */
    public function add() 
    {
        if(request()->isPost())
        {
            (validate('Rule')->doCheck('add'));
            $res = $this->rule->add(input('post.')); 
            if($res)
            {
                return success('添加成功');
            }
            return error('添加失败',config('json.commonError'),10200);

        }
        $pris = $this->rule->pritree();
        $this->assign([
            'pris' => $pris,
            'title' => '添加权限'
            ]);
        return $this->fetch();
    }
    /**
     * 管理员权限页面渲染
     */
    public function edit($id) 
    {
        if(request()->isPost())
        {
            $data = array(
                'pri_name' => input('post.pri_name'),
                'mname' => input('post.mname'),
                'cname' => input('post.cname'),
                'aname' => input('post.aname'),
                'parent_id' => input('post.parent_id')
                );
                if($this->privilege->save($data,['id' => input('post.id')])){
                    $return = array('msg' => '修改成功', 'status' => 0);
                }else{
                    $return = array('msg' => '修改失败', 'status' => 1);
                }
            return json($return);
        }
        $prires = $this->rule->get($id);
        $pris = $this->rule->pritree();
        $this->assign([
            'title' => '修改权限',
            'pris' => $pris,
            'prires' => $prires
            ]);
        return $this->fetch();
    }
    /**
     * 管理员权限删除
     */
    public function del()
    {
        if (request()->isGet()) 
        {
            $id = input('get.id');
            if($this->rule->destroy($id))
            {
                return json(array('msg' => '删除成功！', 'status' => 0));
            }else
            {
                return json(array('msg' => '删除失败！', 'status' => 1));
            }
        }
    }

}





?>    

}
