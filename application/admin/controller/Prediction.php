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
    	$keywords = input('get.keywords');
    	$list = $this->obj->getAllListRelateUser(['status' => 1]);
   		return $this->fetch('',[
   			'title' => '预测列表',
   			'list' => $list,
   			'key' => $keywords == '' ?'请输入关键词':$keywords,
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
}
