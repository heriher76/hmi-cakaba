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

Route::get('/', 'HomeController@index');

Route::get('/berita', 'NewsController@index');
Route::get('/berita/{slug}', 'NewsController@show');

Route::get('/kontak', 'ContactController@index');

Route::get('/tentang', 'AboutController@tentang');
Route::get('/visi-misi', 'AboutController@visimisi');
Route::get('/program-kerja', 'AboutController@proker');

Route::get('/surat-rekomendasi', 'RecommendLetterController@index');
Route::post('/surat-rekomendasi', 'RecommendLetterController@store');
Route::post('/surat-rekomendasi/export', 'RecommendLetterController@export');

Auth::routes();

Route::group(['middleware' => ['role:super-admin']], function () {
    //
});
