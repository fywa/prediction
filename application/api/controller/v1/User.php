<?php
/**
 * @author xiaodong
 * @date(2018 .7.4 10:22)
 */

namespace app\api\controller\v1;
use app\api\service\MathLib;
use app\api\service\Token;
use app\common\enum\ScopeEnum;
/**
 * 用户接口
 */
class User extends Base
{
    protected $beforeActionList=[
        'checkPrimaryScope' => [
            'only'=>'getpersonalcenter,getlistbyid,editpersonalcenter,'
        ],
    ];
	/**
	 * 访问他人的资料
	 */
	public function getListById($userid)
	{
		$list = $this->obj->getListById($userid);
		$user = $this->obj->getCountUserPrediction($userid);
        $all = model('Top')->getSimpleList(0)->toArray();
        $list['top']['median'] =  MathLib::getInstance()->getMedian($all,'avg_score');
        $list['top']['stillprediction'] = $user['stillprediction_count'];
        $list['top']['endprediction'] = $user['endprediction_count'];
		return success('',$list);
	}
	/**
	 * 个人中心
	 */
	public function getPersonalCenter()
	{
		$list = $this->obj->getListById(Token::getCurrentUid());
		return success('',$list);
	}
	/**
	 * 编辑个人中心
	 */
	public function editPersonalCenter()
	{
//		(validate('User')->doCheck('doedit'));
		$res = $this->obj->edit();
		if(!$res)
		{
			return error(config('json.errorEditMsg'),config('json.commonError'),10400);
		}
		return success(config('json.successEditMsg'));
	}
	public function love()
    {
        $type = ScopeEnum::love;
        $operate = ScopeEnum::UserOperate;
        (validate('User')->doCheck('love'));
        if(model('UserAction')->existLove($type,$operate))
        {
            $this->obj->love();
            model('UserAction')->add($type,$operate);
        }else
        {
            return error('已经点过赞了',config('json.commonError'),10600);
        }
        return success('点赞成功');
    }
    /**
     * 关注
     */
    public function attention()
    {
        $type = ScopeEnum::attention;
        $operate = ScopeEnum::UserOperate;
        (validate('User')->doCheck('love'));
        $res = model('UserAction')->existLove($type,$operate);
        if(empty($res))
        {
            $this->obj->attention();
            model('UserAction')->add($type,$operate);
        }else
        {
            $this->obj->cancelAttention();
            model('UserAction')->where('id',$res['id'])->delete();
            return success('取消关注成功');
        }
        return success('关注成功');
    }
    /**
     * 是否关注
     */
    public function isAttention()
    {
        $type = ScopeEnum::attention;
        $operate = ScopeEnum::UserOperate;
        (validate('User')->doCheck('love'));
        if(!model('UserAction')->existLove($type,$operate))
        {
            return success('false');
        }
        return success('true');
    }
}
