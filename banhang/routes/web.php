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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/category/{id}', 'HomeController@getCategory')->name('category/{id}');
Route::get('/home', 'HomeController@getHome')->name('home');
Route::post('/home', 'HomeController@postHome')->name('home');
Route::get('/decorative', 'HomeController@getDecorative')->name('decorative');

Route::get('/createdecorative', 'HomeController@getCreateDecorative')->name('createdecorative');
Route::post('/createdecorative', 'HomeController@postCreateDecorative')->name('createdecorative');

Route::get('/update/{id}', 'HomeController@getUpdate')->name('update/{id}');

Route::post('/update/{id}', 'HomeController@postUpdate')->name('update/{id}');
Route::get('/edit/{id}', 'HomeController@getEdit')->name('edit/{id}');
Route::post('/edit/{id}', 'HomeController@postEdit')->name('edit/{id}');

Route::get('/longdress', 'HomeController@getLongDress')->name('longdress');
Route::get('/createlongdress', 'HomeController@getCreateLong')->name('createlongdress');
Route::post('/createlongdress', 'HomeController@postCreateLong')->name('createlongdress');

Route::get('/updatelong/{id}', 'HomeController@getUpdateLong')->name('updatelong/{id}');
Route::post('/updatelong/{id}', 'HomeController@postUpdateLong')->name('updatelong/{id}');
Route::get('/deletelong/{id}','HomeController@deleteLong')->name('deleteCourse/{id}');

Route::get('/deleteflower/{id}','HomeController@deleteflower')->name('deleteflower/{id}');