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
function error($msg='',$code = 404 ,$errorcode = 0,$requestUrl = ''){
    if($requestUrl)
    {
        $requestUrl = request()->url();
    }
	return json([
		'msg' => $msg,
		'errorcode' => $errorcode,
        'request_url'=> $requestUrl
	],$code);
}
function success($msg='',$data = [], $requestUrl = ''){
    if(empty($requestUrl))
    {
        $requestUrl = request()->url();
    }
	return json([
		'msg' => $msg,
		'errorcode' => 0,
        'request_url'=> $requestUrl
	],202);
}
//分页函数
function pagination($obj)
{
    if($obj)
    {
        $params = request()->param();
        return '<div class="row">'.$obj->appends($params)->render().'</div>';
    }
    else
    {
        return '';
    }
}
/**
 * 产生随机盐值
*/
function code()
{
    return mt_rand(100,10000);
}