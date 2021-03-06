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
// +-----------------------------------------------------------------------
// Token 令牌
// +-----------------------------------------------------------------------
Route::post('api/:version/token/user','api/:version.Token/getToken');
Route::post('api/:version/token/verify','api/:version.Token/verifyToken');

// +-----------------------------------------------------------------------
// 轮播图
// +-----------------------------------------------------------------------
Route::get('api/:version/banner/all','api/:version.Featured/getAllBanner');

// +-----------------------------------------------------------------------
// 预测话题
// +-----------------------------------------------------------------------
//获取预测话题 简单模式
Route::get('api/:version/prediction/simple/:num','api/:version.Prediction/getSimplePrediction');
//用户提交预测话题答案
Route::post('api/:version/user/prediction/answer','api/:version.UserPrediction/answerPrediction');
//发布预测
Route::post('api/:version/user/prediction/release','api/:version.Prediction/addPrediction');
//查询用户提交的预测话题
Route::post('api/:version/user/prediction/self','api/:version.UserPrediction/getPredictionByUserId');
//分组
Route::group('api/:version/prediction',function(){
    Route::get('/all','api/:version.Prediction/getAllPrediction');//获取预测话题 所有
    Route::get('/:id','api/:version.Prediction/getPredictionById',[],['id'=>'\d+']);//获取预测话题 通过id
    //获取预测话题历史值
    Route::get('/history/:id','api/:version.Prediction/getHistoryPredictionById');
    //搜索话题
    Route::get('/search/:title','api/:version.Prediction/searchPrediction');
    //查看个人发布的预测话题
    Route::get('/personal', 'api/:version.Prediction/getAllPersonalPrediction');
});

//结束预测
Route::post('api/:version/prediction/end','api/:version.Prediction/endPersonalPrediction');
//历史曲线查询
Route::get('api/:version/prediction/record','api/:version.HistoryRecord/getRecord');


// +-----------------------------------------------------------------------
// 分享经验
// +-----------------------------------------------------------------------
Route::get('api/:version/experience/simple/:num','api/:version.Experience/getSimpleExperience');
//发布经验
Route::post('api/:version/user/experience/release','api/:version.Experience/addExperience');

// +-----------------------------------------------------------------------
// 排行榜得分
// +-----------------------------------------------------------------------
Route::get('api/:version/Top/simple/:num','api/:version.Top/getSimpleTop');
//获取所有的排行榜和个人的信息
Route::get('api/:version/Top/:num','api/:version.Top/getTop');



// +-----------------------------------------------------------------------
// 评论
// +-----------------------------------------------------------------------
//评论经验分享
Route::post('api/:version/user/experience/comment','api/:version.Comment/commentExperience');
Route::post('api/:version/user/prediction/comment','api/:version.Comment/commentPrediction');
Route::post('api/:version/user/course/comment','api/:version.Comment/commentCourse');


// +-----------------------------------------------------------------------
// 点赞
// +-----------------------------------------------------------------------
//点赞
Route::get('api/:version/user/user/love','api/:version.User/love');
Route::get('api/:version/user/comment/love','api/:version.Comment/love');



// +-----------------------------------------------------------------------
// 用户
// +-----------------------------------------------------------------------
//查看他人数据
Route::get('api/:version/user/other/:userid','api/:version.User/getListById');
//查看个人中心
Route::get('api/:version/user/personal','api/:version.User/getPersonalCenter');
//编辑个人信息
Route::post('api/:version/user/edit/personal','api/:version.User/editPersonalCenter');
//查看个人所有参与预测话题
Route::get('api/:version/user/prediction/all','api/:version.UserPrediction/getPersonalPrediction');
//查看个人参与的详细预测信息
Route::get('api/:version/user/prediction/:predictionid','api/:version.UserPrediction/getOnePrediction',[],['id' => '\d+']);
//查看个人的经验分享
Route::get('api/:version/user/experience/personal','api/:version.Experience/getPersonalExperience');
//查看个人经验分享的详细信息
Route::get('api/:version/user/experience/detail/:id','api/:version.Experience/getPersonalExperienceById');
//关注
Route::get('api/:version/user/user/attention','api/:version.User/attention');
//查询是否关注
Route::get('api/:version/user/user/judgment','api/:version.User/isAttention');


// +-----------------------------------------------------------------------
// 常见问题
// +-----------------------------------------------------------------------
//获取所有的常见问题
Route::get('api/:version/question/simple/:num','api/:version.Question/getSimpleQuestion');
// 通过id获取问题
Route::get('api/:version/question/:id','api/:version.Question/getQuestionById',[],['id' => '\d+']);

// +-----------------------------------------------------------------------
// 预言家课堂
// +-----------------------------------------------------------------------
//获取所有的常见问题
Route::get('api/:version/course/simple/:num','api/:version.Course/getSimpleCourse');
// 通过id获取问题
Route::get('api/:version/course/:id','api/:version.Course/getCourseById',[],['id' => '\d+']);

// +-----------------------------------------------------------------------
// 意见反馈
// +-----------------------------------------------------------------------
//获取所有的常见问题
Route::post('api/:version/suggestion','api/:version.Suggestion/addSuggestion');
