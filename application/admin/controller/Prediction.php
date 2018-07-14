<?php
/**
 * @author xiaodong
 * @date(2018.6.29 9.57)
 */
namespace app\admin\controller;

class Prediction extends Base
{
	private $obj = null;
	public function _initialize()
	{
		parent::_initialize();
		$this->obj = model('Prediction');
	}
	/**
	 * 预测列表
	 */
    public function index()
    {
        $co = input('get.status',1);
    	$keywords = input('get.keywords');
    	$list = $this->obj->getAllListRelateUser(['status' => 1,'main_key' => $co?'':['neq','']]);
   		return $this->fetch('',[
   			'title' => '预测列表',
   			'list' => $list,
   			'key' => $keywords == '' ?'请输入关键词':$keywords,
            'status' => config('status.answer'),
            'co' => $co
   		]);
    } 
    /**
	* 审核列表
	*/
	public function apply()
	{
		$list = $this->obj->getAllListRelateUser(['status' => 0]);
		return $this->fetch('',[
			'title' => '预测申请',
			'list' => $list
		]);
	}
    /**
     * 结束预测
     */
    public function end()
    {
        //post 逻辑
        if(request()->isPost())
        {
            validate(request()->controller())->doCheck('end');
            $res = model(request()->controller())->doEdit();
            if($res)
            {
                return success('更新成功');
            }
            return error('更新失败',config('json.commonError'),10021);
        }
        $id = input('get.id');
        if(empty($id))
        {
            $this->error('缺少id');
        }
        $list = model(request()->controller())->getListByIdByAdmin($id);

        return $this->fetch('',[
            'title' => '结束话题',
            'list' => $list
        ]);
    }
}
