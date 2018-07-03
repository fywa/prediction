<?php

namespace app\common\model;

use think\Model;

class User extends BaseModel
{
    /**
     *通过user_id获取list 
     */
    public function getAllListByUserId($id ,$where = [] , $limit = 0)
    {
        return $this->where('status' , 1)
                    ->where($where)
                    ->where('user_id',$id)
                    ->limit($limit)->select();
    }
    /**
     * 精选用户预测
     */
    public function getTopUserPrediction($id ,$where = [] , $limit = 0)
    {
        return  $this->with(['userprediction' => function($query)use ($limit){
                                $query->limit($limit);
                            }])
                    ->where('status' ,1)
                    ->where($where)
                    ->find($id);
    }
    /**
     * 精选评论
     */
    public function getTopComment($id , $where = [] , $type = 0 ,$limit = 0)
    {
        return $this->with(['comment' => function($query)use ($limit){
            $query->order('love' ,'desc');
        }])
                    ->where('status' ,1)
                    ->where('type',$type)
                    ->where($where)
                    ->where('foreign_id' , $id)
                    ->limit($limit)
                    ->select();
    }	
}
