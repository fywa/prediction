<?php

namespace app\common\model;


class Question extends BaseModel
{
    /**
     * 获取规则
     */
    public function getAddData()
    {
    	return config('status.type');
    }
}
