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
    'middleware' => 'auth'
],function(){

    Route::get('/home','HomeController@index')->name('home');


});


Route::get('/', function () {
    return view('welcome');
});
