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

Route::get('/berita/{category}', 'NewsController@index');
Route::get('/berita/{category}/{slug}', 'NewsController@show');

Route::get('/kontak', 'ContactController@index');

Route::get('/tentang', 'AboutController@tentang');
Route::get('/visi-misi', 'AboutController@visimisi');
Route::get('/program-kerja', 'AboutController@proker');

Route::get('/surat-rekomendasi', 'RecommendLetterController@index');
Route::post('/surat-rekomendasi', 'RecommendLetterController@store');
Route::post('/surat-rekomendasi/export', 'RecommendLetterController@export');

Route::get('/daftar-lk/{slug}', 'DaftarLKController@index');
Route::post('/daftar-lk/{slug}', 'DaftarLKController@store');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    //
});

Route::group(['middleware' => ['role:super-admin'], 'prefix' => 'admin'], function () {
    Route::get('/', 'Admin\DashboardController@index');
    Route::get('/about', 'Admin\AboutController@index');
    Route::put('/about', 'Admin\AboutController@update');
    Route::get('/social-media', 'Admin\SocialMediaController@index');
    Route::put('/social-media', 'Admin\SocialMediaController@update');
    Route::resource('/slider', 'Admin\SliderController');
    Route::resource('/news-category', 'Admin\NewsCategoryController');
    Route::resource('/komisariat', 'Admin\KomisariatController');
    Route::resource('/users', 'Admin\UsersController');

    Route::get('/pengajuan-surat', 'Admin\RecommendLetterController@pengajuanSurat');
    Route::delete('/pengajuan-surat/{id}', 'Admin\RecommendLetterController@destroyPengajuanSurat');
    Route::get('/pengajuan-surat/{id}/reset', 'Admin\RecommendLetterController@resetPengajuanSurat');

    Route::get('/pengajuan-surat/{id}/acc-bpl', 'Admin\RecommendLetterController@accBPL');
    Route::get('/pengajuan-surat/{id}/acc-pa', 'Admin\RecommendLetterController@accPA');
    
    Route::get('/template-surat', 'Admin\RecommendLetterController@templateSurat');
    Route::put('/template-surat', 'Admin\RecommendLetterController@updateTemplateSurat');
});
