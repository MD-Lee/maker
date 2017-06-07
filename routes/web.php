<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*授权目录*/
Route::get('MP_verify_pmpAsuvps9qrYRnk.txt', function () {
    return "pmpAsuvps9qrYRnk";
});

Route::any('/wechat', 'WechatController@serve');
Route::any('/wechatmenu/add', 'WechatMenuController@add');
Route::any('/wechatmenu/del', 'WechatMenuController@del');

Route::group(['namespace'=>'Mobile'], function () {
//Route::group(['namespace'=>'Mobile','middleware' => ['web', 'wechat.oauth:snsapi_userinfo']], function () {
	Route::get('/login','MemberController@toLogin');
	Route::get('/register','MemberController@toRegister');
	Route::any('/message_verify','MemberController@message_verify');
	Route::get('/index','IndexController@index');
	/*产品库*/
	Route::get('/project_lists','ProjectController@project_lists');
	Route::get('/project_details/{id}/{type?}','ProjectController@project_details');
	Route::post('/get_project_list','ProjectController@get_project_list');
	Route::post('/get_project_name','ProjectController@get_project_name');
	/*资源库*/
	Route::get('/resources_list','ResourcesController@resources_list');
	Route::get('/resources_add','ResourcesController@resources_add');
	/*在线培训*/
	Route::get('/cources_lists','CourcesController@cources_lists');
	/*个人中心*/
	Route::get('/person_center','MemberController@person_center');
	Route::any('/user_info','MemberController@user_info');
	Route::get('/user_profit','MemberController@user_profit');
	Route::any('/project_add/{id?}','MemberController@project_add');
	Route::any('/project_list','MemberController@project_list');

	Route::any('/dropload_project/{type?}/{page?}','MemberController@dropload_project');
	Route::get('/user_project','MemberController@user_project');
	Route::get('/user_resources','MemberController@user_resources');
	Route::get('/user_report','MemberController@user_report');
	Route::any('/report_add/{id?}/{rid?}','MemberController@report_add');
	Route::get('/report_details/{id}','MemberController@report_details');
	Route::get('/user_code','MemberController@user_code');
});




Route::group(['prefix'=>'admin'],function (){
//登录注册
Route::get('login','Admin\IndexController@login');
Route::any('index','Admin\IndexController@index');

//项目建立
Route::any('project','Admin\ProjectController@index');

Route::any('project_details/{id}','Admin\ProjectController@project_details');
Route::any('del_project/{id}','Admin\ProjectController@del_project');
Route::any('delall_project','Admin\ProjectController@delall_project');
//产品库
Route::any('product','Admin\ProductController@lists');
Route::any('product_details','Admin\ProductController@product_details');
Route::any('product_in/{id}','Admin\ProductController@product_in');
//资源
Route::any('resources/{t}','Admin\ResourcesController@resources');
Route::any('add_resources/{t?}','Admin\ResourcesController@add_resources');
Route::any('del_resource/{id}','Admin\ResourcesController@del_resource');
//在线培训
Route::any('cources_list','Admin\CourcesController@cources_list');
Route::any('add_cources','Admin\CourcesController@add_cources');
Route::any('classification_list','Admin\CourcesController@classification_list');
Route::any('add_classification','Admin\CourcesController@add_classification');

//在线审核
Route::any('report','Admin\AuditingController@report');
Route::any('report_details/{id}/{t?}','Admin\AuditingController@report_details');
Route::any('del_report/{id}','Admin\AuditingController@del_report');

Route::any('payment','Admin\AuditingController@payment');
Route::any('add_payment/{id?}','Admin\AuditingController@add_payment');
Route::any('del_payment/{id?}','Admin\AuditingController@del_payment');
Route::any('profit','Admin\AuditingController@profit');
Route::any('profit_send/{id}','Admin\AuditingController@profit_send');

//设置
Route::any('setting','Admin\SettingController@setting');
});


