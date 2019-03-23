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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['namespace' => 'Admin', 'prefix' => 'admin'], function(){
    Route::get('/', 'IndexController@index');
    //会员管理
    Route::get('users/list', 'UserController@list');
    Route::get('users/add', 'UserController@add');
    Route::post('users/store', 'UserController@store');
    Route::get('users/edit/{id}', 'UserController@edit');
    Route::post('users/update', 'UserController@update');
    Route::get('users/delete/{id}', 'UserController@delete');
    Route::post('users/search', 'UserController@search');
//    Route::get('users');
    //商品分类管理
    Route::get('goods/category/list', 'GoodsCateGoryController@index');
});
