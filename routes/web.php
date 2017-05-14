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


Route::get('/login','Mobile\MemberController@toLogin');
Route::get('/register','Mobile\MemberController@toRegister');
Route::get('/index','Mobile\IndexController@index');
/*产品库*/
Route::get('/project_lists','Mobile\ProjectController@project_lists');
Route::get('/project_details','Mobile\ProjectController@project_details');
/*资源库*/
Route::get('/resources_list','Mobile\ResourcesController@resources_list');
Route::get('/resources_add','Mobile\ResourcesController@resources_add');
/*在线培训*/
Route::get('/cources_lists','Mobile\CourcesController@cources_lists');
/*个人中心*/
Route::get('/person_center','Mobile\MemberController@person_center');
Route::get('/user_info','Mobile\MemberController@user_info');
Route::get('/user_profit','Mobile\MemberController@user_profit');
Route::get('/project_add','Mobile\MemberController@project_add');
Route::get('/project_list','Mobile\MemberController@project_list');
Route::get('/user_project','Mobile\MemberController@user_project');
Route::get('/user_resources','Mobile\MemberController@user_resources');
Route::get('/user_report','Mobile\MemberController@user_report');
Route::get('/report_add','Mobile\MemberController@report_add');
Route::get('/report_details','Mobile\MemberController@report_details');
Route::get('/user_code','Mobile\MemberController@user_code');


Route::group(['prefix'=>'admin'],function (){
//登录注册
Route::get('login','Admin\IndexController@login');
Route::any('index','Admin\IndexController@index');

//项目建立
Route::any('project','Admin\ProjectController@index');

Route::any('project_details','Admin\ProjectController@project_details');
//产品库
Route::any('product','Admin\ProductController@lists');
Route::any('product_details','Admin\ProductController@product_details');
Route::any('product_in','Admin\ProductController@product_in');
//资源
Route::any('resources','Admin\ResourcesController@resources');
Route::any('add_resources','Admin\ResourcesController@add_resources');
//在线培训
Route::any('cources_list','Admin\CourcesController@cources_list');
Route::any('add_cources','Admin\CourcesController@add_cources');
Route::any('classification_list','Admin\CourcesController@classification_list');
Route::any('add_classification','Admin\CourcesController@add_classification');

//在线审核
Route::any('report','Admin\AuditingController@report');
Route::any('report_details','Admin\AuditingController@report_details');

Route::any('payment','Admin\AuditingController@payment');
Route::any('add_payment','Admin\AuditingController@add_payment');
Route::any('profit','Admin\AuditingController@profit');

//设置
Route::any('setting','Admin\SettingController@setting');
});


