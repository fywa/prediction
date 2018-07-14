<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/7/5 0005
 * Time: 11:53
 * 综合概率值
 */

namespace app\crontab\controller;
use think\Db;


class Max extends Base
{
    /**
     * 综合概率值
     */
    public function index()
    {
        file_put_contents('/tmp/2.txt',"max",FILE_APPEND);
	    $obj = model('Prediction');
        $list = $obj->getMaxTotal()->toArray();
        $data = $history = [];
        $avgWeigth1 = $weigth1 = $avgWeigth2 = $weigth2 = $avgWeigth3 = $weigth3 = 0;
	    $avg = Db::query("select avg(avg_score) as avg from top");
        foreach ($list as $k => $v)
        {
            if(empty($v['userprediction']))
            {
                $data[] = ['max_score' => 0,'max_key' => 'no','id' => $v['id']];
                $history[] = ['score' => 0,'prediction_id' => $v['id']];
                continue;
            }
             foreach ($v['userprediction'] as $k => $vo)
            {
		        $topScore = Db::query("select * from top where user_id = {$vo['user_id']}");
		        if(empty($topScore))
		        {
			        $score = $avg[0]['avg'];
		        }else{
			        $score = $topScore[0]['avg_score'];
		        }
                try{
                    $avgWeigth1 += (2-$score)*($vo['key1']/100);
                    $weigth1 += 2-$score;

                    $avgWeigth2 += (2-$score)*($vo['key2']/100);
                    $weigth2 += 2-$score;

                    $avgWeigth3 += (2-$score)*($vo['key3']/100);
                    $weigth3 += 2-$score;

                }catch(\Exception $e)
                {
                    continue;
                }
            }
            try{
		            $max1 = ($avgWeigth1/$weigth1)*100;
                    $max2 = ($avgWeigth2/$weigth2)*100;
                    $max3 = ($avgWeigth3/$weigth3)*100;
                    if($max1 >= $max2 && $max1 >=$max3)
                    {
                        $data[] = ['max_score' => $max1 ,'max_key' => 'key1','id' => $v['id']];
                        $history[] = ['score' => $max1,'prediction_id' => $v['id']];
                    }elseif($max2 >= $max1 && $max2 >= $max3)
                    {
                        $data[] = ['max_score' => $max2,'max_key' => 'key2','id' => $v['id']];
                        $history[] = ['score' => $max2,'prediction_id' => $v['id']];
                    }elseif($max3 >= $max1 && $max3 >= $max2)
                    {
                        $data[] = ['max_score' => $max3,'max_key' => 'key3','id' => $v['id']];
                        $history[] = ['score' => $max3,'prediction_id' => $v['id']];
                    }
            }catch (\Exception $e)
            {

            }
        }
//        var_dump($data);
//        var_dump($history);
        model('Prediction')->saveAll($data);
        model('HistoryRecord')->saveAll($history);
    }
}
