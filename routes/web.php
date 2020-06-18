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
use Illuminate\Support\Facades\Route;
Auth::routes();

Route::post('article_image_upload','Common\Upload@upload_image')->name('article_image_upload');


Route::group([
    'middleware' => ['auth'],
],function(){

    Route::get('/home','HomeController@index')->name('home');

    Route::resource('/article','ArticleController');
   Route::post('/article/store','ArticleController@store')->name('article.store');

});


Route::get('/', function () {
    return view('welcome');
});


Route::group([
    'prefix'    => 'admin',
    'namespace' => 'Admin',
],function (){


    Route::get('login','LoginController@showLoginForm')->name('admin.login');
    Route::post('login','LoginController@login')->name('admin.login');


    Route::group(['middleware'=>'auth.admin'],function (){
        Route::get('/','HomeController@home')->name('admin.home');
        Route::post('logout', 'LoginController@logout')->name('admin.logout');
        Route::resource('user', 'UserController');
//        Route::post('user/update','UserController@update')->name('admin.user.update');

        Route::post('user/price','UserController@addPrice')->name('admin.user.add_price');

        Route::get('article_list','ArticleListController@index')->name('admin.article.article_list');
        Route::post('article_list/status/{id}','ArticleListController@editStatus')->name('admin.article.status');
    });




});