<?php
/**
 * @author xiaodong
 * @date(2018.6.29 10:02)
 */
namespace app\common\model;
use app\common\enum\ScopeEnum;
/**
 * 预测话题
 */
class HistoryRecord extends BaseModel
{
    protected $hidden = ['update_time','status'];
    public function getRecord()
    {
        $id = input('get.id');
        return $this->where('prediction_id',$id)->select();
    }
}
