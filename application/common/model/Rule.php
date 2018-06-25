<?php
/**
 * @author xiaodo
 * @date(2018.6.25 12:42)
 */
namespace app\common\model;

use think\Model;

class Rule extends Model
{
	private $res = [];
	public function pritree() 
	{
		$data = $this->select();
		$this->resort($data);
		return $this->res;
	}

	public function resort($data,$pId = 0,$level =  0) 
	{
		foreach ($data as $k => $v) 
		{
			if($v['pid'] == $pId)
			{
				$v['level'] = $level;
				$this->$res[] = $v;
				$this->resort($data,$v['id'],$level+1);
			}
		}
	}
	public function getRuleByIds($ids)
	{
		$where['status'] = 1;
		return $this->where($where)
					->where('id','id',$ids)
					->column('name');
	}
}
