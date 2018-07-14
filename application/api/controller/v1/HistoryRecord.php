<?php
/**
 * Created by PhpStorm.
 * User: liuxiaodong
 * Date: 2018/7/12 0012
 * Time: 11:49
 */

namespace app\api\controller\v1;


class HistoryRecord extends Base
{
    /**
     * 历史曲线查询
     */
    public function getRecord()
    {
        (validate('HistoryRecord')->doCheck('record'));
        $list = $this->obj->getRecord();
        return success('',$list);
    }

}