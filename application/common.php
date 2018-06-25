<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
//公用json返回
function error($msg='',$code = 404 ,$errorcode = 0){
	return json([
		'msg' => $msg,
		'errorcode' => $errorcode,
	],$code);
}
function success($msg='',$data = []){
	return json([
		'msg' => $msg,
		'errorcode' => 0,
	],202);
}