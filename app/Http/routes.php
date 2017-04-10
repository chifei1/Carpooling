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

//Route::get('/wap/index', function () {
//    return Socialite::driver('qq')->redirect();
//});
//Route::get('callback', function () {
//    $user = Socialite::driver('wechat')->user()
//    dd($user);
//});


Route::get('/','Auth\AuthController@getMyLogin');
Route::get('auth/qq', 'Auth\AuthController@qq');
Route::get('auth/callback', 'Auth\AuthController@qqcallback');
//Route::get('wap/index/index', 'IndexController@getIndex');

Route::group(['prefix' => 'wap'], function () {
    Route::get('index', 'Auth\AuthController@qqcallback');
    Route::get('indexs','IndexController@getIndex');  //首页
    //Route::get('index','IndexController@getIndex');  //首页
    Route::get('login','Auth\AuthController@getMyLogin');
    Route::post('plogin','Auth\AuthController@postMylogin');
    Route::get('register','Auth\AuthController@getMyregister');
    Route::post('pregister','Auth\AuthController@postMyregister');
    Route::get('qqregister','Auth\AuthController@getQqregister');
    Route::post('pqregister','Auth\AuthController@postQqregister');
});

Route::group(['middleware' => ['login'],'prefix' => 'wap'], function () {
    //Route::get('index','IndexController@getIndex');  //首页
    Route::any('pinche','IndexController@getInfo');   //车主发布详情
    Route::any('people','IndexController@getPeople');    //找乘客页面
    Route::any('release','IndexController@getRelease');    //乘客发布页面
    Route::any('fabu5','IndexController@getOwnerrelease');   //车主发布页面
    Route::any('pinfo','IndexController@getPinfo');        //乘客发布详情
    Route::post('powner','IndexController@postOwner');       //车主发布提交路由
    Route::post('ppeople','IndexController@postPeople');    //乘客发布提交路由
    Route::get('ownercancel','IndexController@Ownercancel');     //车主取消
    Route::get('passengercancel','IndexController@Passengercancel');    //乘客取消
    Route::post('pfabu5','IndexController@postOwnerrelease');          //车主发布提交路由
    Route::post('prelease','IndexController@postRelease');            //乘客发布提交路由
    Route::get('new','IndexController@getNew');            //告示
    Route::post('yudingc','IndexController@postReservedseat');            //预定车
    Route::get('Cancelres','IndexController@getCancelreservation');            //取消预定
    Route::get('logout','Auth\AuthController@getLogout');            //取消预定
    Route::get('map','IndexController@getMap');            //取消预定

});
