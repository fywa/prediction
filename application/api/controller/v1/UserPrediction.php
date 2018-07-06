<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class UserPrediction extends Base
{
	/**
	 *提交预测
	 */
	public function answerPrediction()
	{
		validate('UserPrediction')->doCheck('answer');
		//判断是否已经预测过
		$userId = Token::getCurrentUid();
		$userPrediction = $this->obj->getPredictionByUserId($userId,input('post.prediction_id'));
		if(!empty($userPrediction))
		{
			return error('提交失败，已经预测过了',config('json.commonError'),10301);
		}
		$res = $this->obj->add();
		if(!$res)
		{
			return error('提交失败',config('json.serverError'),10300);
		}
		return success('提交 成功');
	}
	/**
	 *查询用户的预测话题 
	 */
	public function getPredictionByUserId()
	{
		validate('UserPrediction')->doCheck('query');
		$userId = input('post.user_id');
		$res = $this->obj->getPredictionByUserId($userId,input('post.prediction_id'));
		$res['top'] = model('Top')->getListByUserId($userId);
		$res['alreadyprediction'] = $this->obj->getPredictionCountByUserId($userId,['score' => ['neq',0]]);
		$res['notprediction'] = $this->obj->getPredictionCountByUserId($userId,['score' => ['eq',0]]);
		return success('',$res);

	}
	/**
	 * 获取个人所参与的预测话题 通过token uid
	 */
	public function getPersonalPrediction()
	{
		$list = $this->obj->getListByUserId(Token::getCurrentUid());	
		return success('',$list);
	}
	public function getOnePrediction($predictionid)
	{
		$list = $this->obj->getOnePrediction($predictionid);
		return success('',$list);
	}			
}
