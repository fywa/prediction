<?php
namespace app\api\service;

use think\Request;
use think\Cache;
use app\common\exception\TokenException;
use app\common\exception\ForbiddenException;
use app\common\enum\ScopeEnum;

class Token{
	public static function generateToken(){
		//32字符组成一组随机字符串
		$randChars=getRandChars(32);
		$timestamp=$_SERVER['REQUEST_TIME_FLOAT'];
		//salt
		$salt=config('secure.token_salt');
		return md5($randChars.$timestamp.$salt);
	}

	public static function getCurrentTokenVar($key){
		$token = Request::instance()
					->header('token');
		$vars=Cache::get($token);
		if(!$vars){
			throw new TokenException();
		}else{
			//文件缓存器
			if(!is_array($vars)){
			$vars=json_decode($vars,true);
			}
			if(array_key_exists($key,$vars)){
				return $vars[$key];
			}else{
				throw new Exception('token不存在');
			}


		}
	}

	public static function getCurrentUid(){
		// $uid=self::getCurrentTokenVar('uid');
		$uid = 1;
		return $uid;
	}

	public static function needPrimaryScope(){
		//判断scope的大小以及是否存在
		$scope=self::getCurrentTokenVar('scope');
		if($scope){
			if($scope >= ScopeEnum::User){
				return true;
			}else{
				throw new ForbiddenException();
			}
		}else{
			throw new TokenException();
		}

	}
	//只有用户可以访问接口权限
	public static function needExclusiveScope(){
			//判断scope的大小以及是否存在
		$scope=self::getCurrentTokenVar('scope');
		if($scope){
			if($scope == ScopeEnum::User){
				return true;
			}else{
				throw new ForbiddenException();
			}
		}else{
			throw new TokenException();
		}
	
	}
	public static function isValidOperate($chekedUID){
		if(!$chekedUID){
			throw new Exception('uid未传入，或者不正确');
		}
		$currentUID=self::getCurrentUid();
		if($currentUID == $chekedUID){
			return true;
		}
		return false;
	}

	public static function verifyToken($token){
		$exist = Cache::get($token);
		if($exist){
			return true;
		}else{
			return false;
		}
	}
}
