<?php

namespace app\common\model;

use think\Model;

class Comment extends BaseModel
{
    /**
     * 精选评论
     */
    public function getTopCommentByForeignId($id , $where = [] , $type = 0 ,$limit = 0)
    {
        return $this->where('status' ,1)
                    ->where('type',$type)
                    ->where($where)
                    ->limit($limit)
                    ->order('love','desc')
                    ->where('foreign_id' , $id)
                    ->select();
    }
}
