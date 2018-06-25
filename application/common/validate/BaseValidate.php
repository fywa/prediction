<?php
namespace app\common\validate;
use think\Validate;
use think\Request;
use think\Exception;
use app\common\exception\ParameterException;
/**
* 基类
*/
class BaseValidate extends Validate
{
	/**
	 * [doCheck 用于接受参数进行validaet校验]
	 * @return [type] [boolean]
	 * @author xiaodo 2017-12-17
	 */
	public function doCheck()
	{
		$request = Request::instance();
		$params = $request->param();

		$result = $this->check($params);
		if(!$result)
		{
			$data = array('msg'=>$this->error);
			throw new ParameterException($data);
		}

	}	
	protected function isPositiveInteger($value,$rule='',$data='',$field='')
	{

		if(is_numeric($value)&&is_int($value+0)&&($value+0)>0)
		{
			return true;
		}else
		{
			return false;
		}
	}
	protected function isNotEmpty($value,$rule='',$data='',$field='')
	{
		if(empty($value))
		{
			return false;
		}
		else
		{
			return true;
		}

	}
	/**
	 * 判断用户是否存在
	 */
	protected function isExist($value , $rule = '', $data = '', $field = '')
	{
		if(model('Admin')->where('username',$value)->find())
		{
			return true;
		}else
		{
			return false;
		}

	}
	public function getDataByRule($arrays)
	{
		if(array_key_exists('user_id',$arrays)||array_key_exists('uid',$arrays))
		{
			throw new ParameterException(['msg'=>'参数包含有非法参数名user_id或者uid']);
		}		
		$newArray=[];
		foreach($this->rule as $key=>$value)
		{
			$newArray[$value[0]]=$arrays[$value[0]];
		}
		return $newArray;
	
	}
	public function isMobile($value,$rule='',$data,$field='')
	{
		$rule='^1(3|4|5|7|8)[0-9]\d{8}$^';
		$result=preg_match($rule,$value);
		if($result)
		{
			return true;
		}else
		{
			return false;
		}
	}
}
