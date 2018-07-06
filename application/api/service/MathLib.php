<?php
namespace app\api\service;

class MathLib
{
	private static $_instance = null;
	public static function getInstance()
	{
		if(self::$_instance == null)
		{
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	public static function getMedian($arr = [],$key = '')
	{
		$len = count($arr,COUNT_NORMAL);
		if($len == 0)
		{
			return 0;
		}
		if($len == 2)
		{
			return ($arr[0][$key] + $arr[1][$key])/2;
		}
		if($len == 1)
		{
			return $arr[0][$key];
		}
		if($len%2 == 0){
			$median = $len/2;
			return ($arr[$median][$key] + $arr[$median-1][$key])/2;
		}
		if($len%2 == 1)
		{
			$median = $len/2;
			return $arr[$median][$key];
		}
		return 0;
	}
	public static function getBlair($key,$data)
    {
        $res = 0 ;
        try{
            switch($key)
            {
                case 'key1':
                    $res = pow(1-$data['key1']/100,2) + pow(0-$data['key2']/100,2)+pow(0-$data['key3']/100,2);
                    break;
                case 'key2':
                    $res = pow(0-$data['key1']/100,2) + pow(1-$data['key2']/100,2)+pow(0-$data['key3']/100,2);
                    break;
                case 'key3':
                    $res = pow(0-$data['key1']/100,2) + pow(0-$data['key2']/100,2)+pow(1-$data['key3']/100,2);
                    break;
                default:
                    $res = pow(0-$data['key1']/100,2) + pow(0-$data['key2']/100,2)+pow(0-$data['key3']/100,2);
                    break;
            }
        }catch (\Exception $e)
        {
           $res = -1;
        }

        return $res;
    }

}