<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;
use app\api\service\Token;
use app\common\enum\ScopeEnum;
/**
 * 预测话题
 */
class Experience extends BaseModel
{
	protected $hidden = ['create_time','update_time','status'];
	public function getSimpleList($num)
	{
		return $this->where(self::$normal)->limit($num)->select();
	}
	/**
     * 根据id查询 经验的详细信息
     */
    public function getListById($id)
    {
        return $this->withCount('comment',['type' => ScopeEnum::ExperienceComment])//统计留言人数
        			->with(['comment'=>function($query){
        			    $query->where('type',ScopeEnum::ExperienceComment);
        }])//留言人数
        			->where(['status' => 1 ,'user_id' => Token::getCurrentUid()])
        			->find($id);
    }
    /**
     * 添加经验分享
     */
    public function add()
    {
        $data = input('post.');
        $data['user_id'] = Token::getCurrentUid();
        return $this->allowField(true)->save($data);
    }
}
