<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/7/5 0005
 * Time: 11:49
 * 计算用户的blar得分
 */

namespace app\crontab\controller;
use app\api\service\MathLib;
use think\Db;

class Blair extends Base
{
    /**
     * 布莱尔得分
     */
    public function index()
    {
        file_put_contents('/tmp/2.txt',"blair",FILE_APPEND);
        $list = model('Prediction')->getBlair()->toArray();
        $data = [];
        foreach ($list as $k => $v)
        {

            $key = $v['choose_key'];
            foreach ($v['userprediction'] as $k => $v)
            {
                $score = MathLib::getInstance()->getBlair($key,$v);
                $data[] = ['score' => $score,'id' => $v['id']];
            }
        }
        model('UserPrediction')->saveAll($data);
    }

}