<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/7/5 0005
 * Time: 11:42
 * 定时任务计算排行榜
 */
namespace app\crontab\controller;
use think\Db;

class Top extends Base
{
    /**
     * 排行榜排名
     */
    public function index()
    {
        file_put_contents('/tmp/2.txt',"top",FILE_APPEND);
       $list =  Db::query("select user_prediction.user_id,avg(user_prediction.score) avg_score from user left join user_prediction on user.id = user_prediction.user_id and user_prediction.score<>-1 group by user.id ORDER BY avg_score asc limit ".config('json.topNum').";");
        $res = Db::query("delete from top;");
        foreach ($list as $k => &$v)
        {
            $v['id'] = $k + 1;
        }
//        print_r($list);exit;
        Db::table('top')->insertAll($list);
    }


}