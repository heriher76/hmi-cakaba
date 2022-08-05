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

Route::group(['middleware' => ['auth', 'verified', 'role:super-admin|admin-cabang|admin-bpl|admin-komisariat|admin-kohati|kader|publik']], function () {
    Route::get('/my-profile', 'MyProfileController@index');
    Route::put('/my-profile', 'MyProfileController@update');

    Route::get('/surat-rekomendasi', 'RecommendLetterController@index');
    Route::post('/surat-rekomendasi', 'RecommendLetterController@store');
    Route::post('/surat-rekomendasi/export', 'RecommendLetterController@export');
});

Route::group(['middleware' => ['auth'], 'prefix' => 'admin'], function () {
    Route::group(['middleware' => ['role:super-admin|admin-cabang|admin-bpl|admin-komisariat|admin-kohati']], function () {    
        Route::get('/', 'Admin\DashboardController@index');
    });

    Route::group(['middleware' => ['role:admin-komisariat']], function () {
        Route::get('/pendaftar-lk', 'Admin\PendaftarLKController@index');
        Route::get('/pendaftar-lk/download', 'Admin\PendaftarLKController@download');
        Route::get('/pendaftar-lk/{id}', 'Admin\PendaftarLKController@show');
        Route::get('/pendaftar-lk/{id}/sudah-lk', 'Admin\PendaftarLKController@sudahLK');
        Route::get('/pendaftar-lk/{id}/tidak-lk', 'Admin\PendaftarLKController@tidakLK');

        Route::get('/kader-komisariat', 'Admin\KaderKomisariatController@index');
        Route::get('/kader-komisariat/download', 'Admin\KaderKomisariatController@download');

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

    Route::group(['middleware' => ['role:super-admin|admin-cabang|admin-bpl|admin-kohati']], function () {    
        Route::get('/training-raya/pendaftar-lk2', 'TrainingRaya\PendaftarController@pendaftar_lk2');    
        Route::get('/training-raya/pendaftar-lkk', 'TrainingRaya\PendaftarController@pendaftar_lkk');    
        Route::get('/training-raya/pendaftar-sc', 'TrainingRaya\PendaftarController@pendaftar_sc');
           
        Route::get('/training-raya/screener-lk2', 'TrainingRaya\ScreenerController@screener_lk2');  
        Route::post('/training-raya/screener', 'TrainingRaya\ScreenerController@store_screener');  
        Route::get('/training-raya/screener/delete/{id}', 'TrainingRaya\ScreenerController@delete_screener');  

        Route::get('/training-raya/screener-lkk', 'TrainingRaya\ScreenerController@screener_lkk');   
        Route::get('/training-raya/screener-sc', 'TrainingRaya\ScreenerController@screener_sc');

        Route::get('/training-raya/resume-lk2', 'TrainingRaya\ResumeController@resume_lk2');   
        Route::get('/training-raya/resume-lkk', 'TrainingRaya\ResumeController@resume_lkk');   
        Route::get('/training-raya/resume-sc', 'TrainingRaya\ResumeController@resume_sc');
    });
});

Route::get('/daftar-training-raya', 'TrainingRaya\DaftarController@index');
Route::post('/daftar-training-raya', 'TrainingRaya\DaftarController@store');

Route::group(['middleware' => ['auth', 'role:user-lk2|user-lkk|user-sc']], function () {
    Route::get('/dashboard-training', 'TrainingRaya\DashboardController@index');
    Route::get('/dashboard-training/jurnal/{id}', 'TrainingRaya\JurnalController@show');
    
    Route::get('/absensi/{idKategori}/{idMateri}', 'TrainingRaya\AbsensiController@store');
});