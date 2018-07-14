<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/7/5 0005
 * Time: 11:53
 * 综合概率值
 */

namespace app\crontab\controller;


class Total extends Base
{
    /**
     * 综合概率值
     */
    public function index()
    {
        file_put_contents('/tmp/2.txt',"total",FILE_APPEND);
        $list = model('Prediction')->getTotal()->toArray();
        var_dump($list);
        $data = [];
        $avgWeigth = 0;
        $weigth = 0;
        foreach ($list as $k => $v)
        {

            $key = $v['choose_key'];
            foreach ($v['userprediction'] as $k => $vo)
            {
                try{
                    $avgWeigth += (2-$vo['score'])*(in_array($key ,['key1','key2','key3'])?$vo[$key]/100:0);
                    $weigth += 2-$vo['score'];
                }catch(\Exception $e)
                {
                    continue;
                }
            }
            try{
                $data[] = ['main_score' => ($avgWeigth/$weigth)*100,'id' => $v['id']];
            }catch (\Exception $e)
            {
                $data[] = ['main_score' => -1,'id' => $v['id']];
            }

        }
        model('Prediction')->saveAll($data);
    }
}
