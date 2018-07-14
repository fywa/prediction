<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;
use app\api\service\Token;

class Course extends Base
{
    protected $beforeActionList=[
        'checkPrimaryScope' => [
            'only'=>'getsimplecourse,getcoursebyid'
        ],
    ];
	/**
	 *获取固定条数的问题
	 */
	public function getSimpleCourse($num = 2)
	{
		$list = $this->obj->getSimpleList($num);
		return success('',$list);
	}
	public function getCourseById($id)
	{
		$list = $this->obj->getListById($id);
        $this->obj->watchs($id);
		return success('',$list);
	}

}
