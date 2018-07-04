<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

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
	/**
	 * 搜索话题
	 */
	public function searchPrediction($title)
	{
		$list = $this->obj->getAllList(['status' => 1 ,'title' => ['like',"%".$title."%"]]);
		return success('',$list);
	}	
	/**
	 * 获取个人所有预测的话题
	 */
	public function getAllPersonalPrediction()
	{
		$list = $this->obj->getListByUserId(Token::getCurrentUid());
		return success('',$list);
	}
	/**
	 * 发布预测
	 */
	public function addPrediction()
	{
		(validate('Prediction')->doCheck('doadd'));
		$res = $this->obj->add();
		if(!$res)
		{
			return error('预测失败',confif('json.commonError'),10302);
		}
		return success('预测成功');
	}
}
