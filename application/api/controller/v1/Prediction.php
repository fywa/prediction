<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;


class Prediction extends Base
{
	/**
	 *获取固定条数的预测话题
	 */
	public function getSimplePrediction($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
	/**
	 * 获取所有的预测话题
	 */
	public function getAllPrediction()
	{
		$list = $this->obj->getAllList();
		return success('',$list);
	}
	/**
	 * 获取所有的预测话题
	 */
	public function getPredictionById($id)
	{
		$list = $this->obj->getListById($id);
		return success('',$list);
	}
	/**
	 * 获取预测话题的历史值
	 */
	public function getHistoryPredictionById($id)
	{
		$list = $this->obj->getHistoryPredictionById($id);
		return success('',$list);
	}
}
