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

Route::get('/join-hmi', 'JoinHMIController@index');
Route::post('/join-hmi', 'JoinHMIController@store');

Route::get('/daftar-lk/{slug}', 'DaftarLKController@index');
Route::post('/daftar-lk/{slug}', 'DaftarLKController@store');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/my-profile', 'MyProfileController@index');
    Route::put('/my-profile', 'MyProfileController@update');

    Route::get('/surat-rekomendasi', 'RecommendLetterController@index');
    Route::post('/surat-rekomendasi', 'RecommendLetterController@store');
    Route::post('/surat-rekomendasi/export', 'RecommendLetterController@export');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['role:super-admin|admin-cabang|admin-bpl|admin-komisariat']], function () {    
        Route::get('/', 'Admin\DashboardController@index');
    });

    Route::group(['middleware' => ['role:admin-komisariat']], function () {
        Route::get('/pendaftar-lk', 'Admin\PendaftarLKController@index');
        Route::get('/pendaftar-lk/{id}', 'Admin\PendaftarLKController@show');
        Route::get('/pendaftar-lk/{id}/sudah-lk', 'Admin\PendaftarLKController@sudahLK');
        Route::get('/pendaftar-lk/{id}/tidak-lk', 'Admin\PendaftarLKController@tidakLK');

        Route::get('/kader-komisariat', 'Admin\KaderKomisariatController@index');

        Route::get('/opsi-komisariat', 'Admin\OpsiKomisariatController@index');
        Route::put('/opsi-komisariat', 'Admin\OpsiKomisariatController@update');

        Route::post('/import-excel', 'Admin\KaderKomisariatController@importExcel');
    });

    Route::group(['middleware' => ['role:super-admin']], function () {
        Route::get('/about', 'Admin\AboutController@index');
        Route::put('/about', 'Admin\AboutController@update');
        Route::get('/social-media', 'Admin\SocialMediaController@index');
        Route::put('/social-media', 'Admin\SocialMediaController@update');
        Route::resource('/slider', 'Admin\SliderController');
        Route::resource('/news-category', 'Admin\NewsCategoryController');
        Route::resource('/komisariat', 'Admin\KomisariatController');
        Route::resource('/users', 'Admin\UsersController');
        Route::get('/template-surat', 'Admin\RecommendLetterController@templateSurat');
        Route::put('/template-surat', 'Admin\RecommendLetterController@updateTemplateSurat');
        Route::group(['prefix' => 'user'], function () {
            Route::get('/{slug}/create', 'Admin\UsersController@create');
            Route::get('/{slug}/{id}/edit', 'Admin\UsersController@edit');
            Route::put('/{slug}/{id}', 'Admin\UsersController@update');
            Route::delete('/{slug}/{id}', 'Admin\UsersController@destroy');
            Route::post('/{slug}', 'Admin\UsersController@store');
            Route::get('/{slug}', 'Admin\UsersController@index');
        });
    });

    Route::group(['middleware' => ['role:super-admin|admin-cabang|admin-bpl']], function () {
        Route::get('/pengajuan-surat', 'Admin\RecommendLetterController@pengajuanSurat');

        Route::delete('/pengajuan-surat/{id}', 'Admin\RecommendLetterController@destroyPengajuanSurat');
        Route::get('/pengajuan-surat/{id}/reset', 'Admin\RecommendLetterController@resetPengajuanSurat');
    });
    
    Route::group(['middleware' => ['role:super-admin|admin-cabang']], function () {
        Route::post('/pengajuan-surat/{id}/acc-pa', 'Admin\RecommendLetterController@accPA');
        Route::get('/pengajuan-surat/{id}/reject-pa', 'Admin\RecommendLetterController@rejectPA');
    });

    Route::group(['middleware' => ['role:super-admin|admin-bpl']], function () {
        Route::get('/pengajuan-surat/{id}/acc-bpl', 'Admin\RecommendLetterController@accBPL');
        Route::get('/pengajuan-surat/{id}/reject-bpl', 'Admin\RecommendLetterController@rejectBPL');
    });
});
