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



Auth::routes();

Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');
Route::get('/about', 'HomeController@about');
Route::get('/donate', 'HomeController@donate');

Route::group(['prefix'=>'admin', 'middleware' => 'admin'], function(){
    Route::resource('documents', 'DocumentController');
});

Route::resource('documents', 'DocumentFrontController');
Route::get('download/{id}', 'DownloadController@document');

#region Тестирование

Route::group(['prefix' => 'test'], function() {
    Route::get('/', 'DocumentFrontController@index');
    Route::get('start/{id}', 'TestController@start');
    Route::post('question', 'TestController@question');
    Route::get('question', 'TestController@questionGet');
    Route::get('result', 'TestController@result');
});

#endregion



Route::any('/file-uploads', 'UploadController@fineUpload');
Route::any('/file-uploads/{uuid}', 'UploadController@fineUploadDelete');



if (env('APP_DEBUG') == true) {
    Route::get('/error403', 'HomeController@error403');
    Route::get('/error404', 'HomeController@error404');
    Route::get('/error500', 'HomeController@error500');
    Route::get('/error503', 'HomeController@error503');
}
