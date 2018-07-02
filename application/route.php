<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006~2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Route;
/**
 * token令牌	
 */
Route::post('api/:version/token/user','api/:version.Token/getToken');
Route::post('api/:version/token/verify','api/:version.Token/verifyToken');

/**
 * banner图获取
 */
Route::get('api/:version/banner/all','api/:version.Featured/getAllBanner');

Route::get('api/:version/theme','api/:version.Theme/getSimpleList');
Route::get('api/:version/theme/:id','api/:version.Theme/getComplexOne');
//product商品

// Route::get('api/:version/product/bycategory','api/:version.Product/getAllInCategory');
// Route::get('api/:version/product/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
// Route::get('api/:version/product/recent','api/:version.Product/getRecent');
Route::group('api/:version/product',function(){
					Route::get('/by_category','api/:version.Product/getAllInCategory');
					Route::get('/:id','api/:version.Product/getOne',[],['id'=>'\d+']);
					Route::get('/recent','api/:version.Product/getRecent');
});

Route::get('api/:version/category/all','api/:version.Category/getAllCategories');



//地址
Route::post('api/:version/address','api/:version.Address/createOrUpdateAddress');
//订单
Route::post('api/:version/order','api/:version.Order/placeOrder');
//支付
Route::post('api/:version/pay/preorder','api/:version.Pay/getPreOrder');
//微信的回调机制
Route::post('api/:version/pay/notify','api/:version.Pay/receiveNotify');
//订单分页
Route::get('api/:version/order/byuser','api/:version.Order/getSummaryByUser');
Route::get('api/:version/order/:id','api/:version.Order/getDetail',[],['id'=>'\d+']);