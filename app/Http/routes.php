<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    // return view('welcome');
    return view('Admin/index');
});

























































































































































// 创建后台的分类路由
Route::resource('/admin/cate','Admin\CateController');

Route::controller('/admin','Admin\CateController');





