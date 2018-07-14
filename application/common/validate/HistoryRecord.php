<?php
namespace app\common\validate;

class HistoryRecord extends BaseValidate
{
    protected $rule=[
        ['id','require','参数缺少id'],

    ];

    protected $scene = [
        'record' => ['id'],
    ];
}