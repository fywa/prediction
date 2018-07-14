<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class Experience extends Base
{
    protected $beforeActionList=[
        'checkPrimaryScope' => [
            'only'=>'getsimpleexperience,getpersonalexperience,getpersonalexperiencebyid,addexperience'
        ],
    ];
	public function getSimpleExperience($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
	/**
	 * 查看个人的经验分享
	 */
	public function getPersonalExperience()
	{
        (validate('Experience')->doCheck('get'));
		$list = $this->obj->getAllList(['status' => 1 ,'user_id' => input('get.user_id')]);
		return success('',$list);
	}
	/**
	 * 查看个人的经验分享的详细信息
	 */
	public function getPersonalExperienceById($id)
	{
		$list = $this->obj->getListById($id);
		return success('',$list);
	}
    /**
     * 发布经验分享
     */
    public function addExperience()
    {
        (validate('Experience')->doCheck('doadd'));
        $res = $this->obj->add();
        if(!$res)
        {
            return error('发布经验失败',config('json.commonError'),10302);
        }
        return success('发布经验成功');
    }
}
