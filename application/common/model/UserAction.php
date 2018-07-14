<?php

namespace app\common\model;
use app\api\service\Token;
use app\common\enum\ScopeEnum;

class UserAction extends BaseModel
{
    public function existLove($type,$operate)
    {
        $data['foreign_id'] = input('get.id');
        $data['user_id'] = Token::getCurrentUid();
        $data['type'] = $type;
        $data['operate'] = $operate;
        $res = $this->where($data)->find();
        return $res;
    }
    public function add($type,$operate)
    {
        $data['foreign_id'] = input('get.id');
        $data['user_id'] = Token::getCurrentUid();
        $data['type'] = $type;
        $data['operate'] = $operate;
        return $this->save($data);
    }
}
