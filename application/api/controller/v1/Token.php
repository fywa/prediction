<?php
/**
 * @author xiaodong
 * @date(2018 .7.2 14:56)
 */
namespace app\api\controller\v1;

use app\common\exception\ParameterException;
use app\api\service\UserToken;
use app\api\service\Token as TokenService;
class Token
{
	public function getToken($code=''){
		validate('TokenGet')->docheck();
		$tk=new UserToken($code);
		$token=$tk->get();
		return ['token'=>$token];

	}
	public function verifyToken($token=''){
		if(!$token){
			throw new ParameterException([
				'msg' => 'token不允许为空'
			]);
		}
		$valid = TokenService::verifyToken($token);
		if($valid)
		{
			return success('通过验证');
		}
		return error('验证失败',config('json.commonError'),11000);
	}
	
}