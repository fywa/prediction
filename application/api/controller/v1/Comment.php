<?php
/**
 * @author xiaodong
 * @date(2018 .7.4 15:20)
 */
namespace app\api\controller\v1;
use app\api\service\Token;
use app\common\enum\ScopeEnum;
class Comment extends Base
{
    protected $beforeActionList=[
        'checkPrimaryScope' => [
            'only'=>'commentexperience'
        ],
    ];

    /**
     * 评论经验分享
     */
	public function commentExperience()
	{
		(validate('Comment')->doCheck('doadd'));
        $ex = model('Experience')->get(input('post.id'));
        if(empty($ex))
        {
            return error('经验不存在',config('json.serverError'),10501);
        }
		$res = $this->obj->add(ScopeEnum::ExperienceComment);

		if(!$res)
		{
			return error('评论失败',config('json.serverError'),10501);
		}
		return success('评论成功');
	}

    /**
     * 评论预测话题
     */
    public function commentPrediction()
    {
        (validate('Comment')->doCheck('doadd'));
        $ex = model('prediction')->get(input('post.id'));
        if(empty($ex))
        {
            return error('预测不存在',config('json.serverError'),10501);
        }
        $res = $this->obj->add(ScopeEnum::PredictionComment);
        if(!$res)
        {
            return error('评论失败',config('json.serverError'),10501);
        }
        return success('评论成功');
    }
    /**
     * 评论预言家课堂
     */
    public function commentCourse()
    {
        (validate('Comment')->doCheck('doadd'));
        $ex = model('Course')->get(input('post.id'));
        if(empty($ex))
        {
            return error('id不存在',config('json.serverError'),10501);
        }
        $res = $this->obj->add(ScopeEnum::CourseComment);
        if(!$res)
        {
            return error('评论失败',config('json.serverError'),10501);
        }
        return success('评论成功');
    }

    /**
     * 评论点赞
     */
    public function love()
    {
        $type = ScopeEnum::love;
        $operate = ScopeEnum::CommentOperate;
        (validate('Comment')->doCheck('love'));
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
}
