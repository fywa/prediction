<?php

namespace app\common\model;
use app\common\enum\ScopeEnum;

class Course extends BaseModel
{
    /**
     * 获取规则
     */
    public function getAddData()
    {
    	return config('status.type');
    }
    /**
     * 获取指定条数的列表
     */
    public function getSimpleList($num)
	{
		return $this->where(self::$normal)->limit($num)->select();
	}
    /**
     * 根据id查询 经验的详细信息
     */
    public function getListById($id)
    {
        return $this->withCount(['comment' => function($query){
            $query->where('type',ScopeEnum::CourseComment);
        }])//统计留言人数
        ->with(['comment'=>function($query){
            $query->where('type',ScopeEnum::CourseComment);
        }])//留言人数
        ->where(['status' => 1])
            ->find($id);
    }
}
