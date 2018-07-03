<?php

namespace app\common\model;

use think\Model;
use app\api\service\Token;
class UserPrediction extends Model
{
    /**
     * 回答预测话题
     */
    public function add()
    {
        $data = input('post.');
        $data['user_id'] = Token::getCurrentUid();
        $data['status'] = 1;
        return $this->allowField(true)->save($data);    	
    }
}
