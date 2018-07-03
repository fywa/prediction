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

}