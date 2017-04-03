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

Route::group(['prefix'=>'admin'], function(){
    Route::resource('documents', 'DocumentController');
});

Route::any('/file-uploads', 'UploadController@fineUpload');
Route::any('/file-uploads/{uuid}', 'UploadController@fineUploadDelete');


/**
 * Пути для скрытия данных
 */
Route::any('uploads', function(){
    //throw new HttpUrlException('Запрошен путь до папки загрузок');
});

if (env('APP_DEBUG') == true) {
    Route::get('/error404', 'HomeController@error404');
    Route::get('/error500', 'HomeController@error500');
    Route::get('/error503', 'HomeController@error503');
}
