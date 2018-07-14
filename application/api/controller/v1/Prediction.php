<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;
use app\common\enum\ScopeEnum;

class Prediction extends Base
{
    protected $beforeActionList=[
        'checkPrimaryScope' => [
            'only'=>'getsimpleprediction,getallprediction,getpredictionbyid,gethistorypredictionbyid,searchprediction,getallpersonalprediction,addprediction,endpersonalprediction'
        ],
    ];
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
     * 获取个人所有预测的话题
     */
    public function getAllPersonalPrediction()
    {
        validate('Prediction')->doCheck('get');
        $list = $this->obj->getListByUserId(input('get.user_id'));
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
	/**
     * 结束预测话题
     */
	public function endPersonalPrediction()
    {
        (validate('Prediction')->doCheck('end'));
        $list = $this->obj->where(['id' => input('post.id'),'choose_key' => ['eq',''],'status' => 1])->find();
        if(!empty($list))
        {
            $res = $this->obj->end();
            if(!$res)
            {
                return error('结束失败',config('json.commonError'),10302);
            }
            return success('结束成功');
        }
        return error('话题已经结束过了',config('json.commonError',10302));

    }
}
