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

        Route::get('/training-raya/user/{id}', 'TrainingRaya\PendaftarController@detail');
        
        Route::get('/training-raya/informasi-lk2', 'TrainingRaya\InformasiController@informasi_lk2');  
        Route::get('/training-raya/informasi-lkk', 'TrainingRaya\InformasiController@informasi_lkk');   
        Route::get('/training-raya/informasi-sc', 'TrainingRaya\InformasiController@informasi_sc');
        Route::post('/training-raya/informasi', 'TrainingRaya\InformasiController@store_informasi');  
        Route::get('/training-raya/informasi/delete/{id}', 'TrainingRaya\InformasiController@delete_informasi');  

        Route::get('/training-raya/screener-lk2', 'TrainingRaya\ScreenerController@screener_lk2');  
        Route::get('/training-raya/screener-lkk', 'TrainingRaya\ScreenerController@screener_lkk');   
        Route::get('/training-raya/screener-sc', 'TrainingRaya\ScreenerController@screener_sc');
        Route::post('/training-raya/screener', 'TrainingRaya\ScreenerController@store_screener');  
        Route::get('/training-raya/screener/delete/{id}', 'TrainingRaya\ScreenerController@delete_screener');  
        
        Route::get('/training-raya/materi-forum-lk2', 'TrainingRaya\MateriForumController@materi_forum_lk2');  
        Route::get('/training-raya/materi-forum-lkk', 'TrainingRaya\MateriForumController@materi_forum_lkk');  
        Route::get('/training-raya/materi-forum-sc', 'TrainingRaya\MateriForumController@materi_forum_sc');  
        Route::post('/training-raya/materi-forum', 'TrainingRaya\MateriForumController@store_materi_forum');  
        Route::get('/training-raya/materi-forum/delete/{id}', 'TrainingRaya\MateriForumController@delete_materi_forum');  

        Route::get('/training-raya/materi-screening-lk2', 'TrainingRaya\MateriScreeningController@materi_screening_lk2');  
        Route::get('/training-raya/materi-screening-lkk', 'TrainingRaya\MateriScreeningController@materi_screening_lkk');  
        Route::get('/training-raya/materi-screening-sc', 'TrainingRaya\MateriScreeningController@materi_screening_sc');  
        Route::post('/training-raya/materi-screening', 'TrainingRaya\MateriScreeningController@store_materi_screening');  
        Route::get('/training-raya/materi-screening/delete/{id}', 'TrainingRaya\MateriScreeningController@delete_materi_screening');  
        
        Route::get('/training-raya/absensi-lk2', 'TrainingRaya\LihatAbsensiController@absensi_lk2');   
        Route::get('/training-raya/absensi-lk2/{idMateri}', 'TrainingRaya\LihatAbsensiController@absensi_lk2_list_data');   
        Route::get('/training-raya/absensi-lkk', 'TrainingRaya\LihatAbsensiController@absensi_lkk');   
        Route::get('/training-raya/absensi-lkk/{idMateri}', 'TrainingRaya\LihatAbsensiController@absensi_lkk_list_data');
        Route::get('/training-raya/absensi-sc', 'TrainingRaya\LihatAbsensiController@absensi_sc');
        Route::get('/training-raya/absensi-sc/{idMateri}', 'TrainingRaya\LihatAbsensiController@absensi_sc_list_data');
        Route::get('/training-raya/absensi/delete/{id}', 'TrainingRaya\LihatAbsensiController@delete_absensi');   

        Route::get('/training-raya/hasil-screening-lk2', 'TrainingRaya\HasilScreeningController@hasil_screening_lk2');   
        Route::get('/training-raya/hasil-screening-lk2/{idMateri}', 'TrainingRaya\HasilScreeningController@hasil_screening_lk2_list_data');   
        Route::get('/training-raya/hasil-screening-lkk', 'TrainingRaya\HasilScreeningController@hasil_screening_lkk');   
        Route::get('/training-raya/hasil-screening-lkk/{idMateri}', 'TrainingRaya\HasilScreeningController@hasil_screening_lkk_list_data');
        Route::get('/training-raya/hasil-screening-sc', 'TrainingRaya\HasilScreeningController@hasil_screening_sc');
        Route::get('/training-raya/hasil-screening-sc/{idMateri}', 'TrainingRaya\HasilScreeningController@hasil_screening_sc_list_data');
        Route::get('/training-raya/hasil-screening/delete/{id}', 'TrainingRaya\HasilScreeningController@delete_hasil_screening'); 

        Route::get('/training-raya/resume-lk2', 'TrainingRaya\ResumeController@resume_lk2');   
        Route::get('/training-raya/resume-lk2/{idMateri}', 'TrainingRaya\ResumeController@resume_lk2_list_data');   
        Route::get('/training-raya/resume-lkk', 'TrainingRaya\ResumeController@resume_lkk');   
        Route::get('/training-raya/resume-lkk/{idMateri}', 'TrainingRaya\ResumeController@resume_lkk_list_data');
        Route::get('/training-raya/resume-sc', 'TrainingRaya\ResumeController@resume_sc');
        Route::get('/training-raya/resume-sc/{idMateri}', 'TrainingRaya\ResumeController@resume_sc_list_data');
        Route::get('/training-raya/resume/delete/{id}', 'TrainingRaya\ResumeController@delete_resume');   
        
        Route::get('/training-raya/respon-harian-lk2', 'TrainingRaya\ResponHarianController@respon_harian_lk2');  
        Route::get('/training-raya/respon-harian-lkk', 'TrainingRaya\ResponHarianController@respon_harian_lkk');  
        Route::get('/training-raya/respon-harian-sc', 'TrainingRaya\ResponHarianController@respon_harian_sc');  
        Route::get('/training-raya/respon-harian/delete/{id}', 'TrainingRaya\ResponHarianController@delete_respon_harian');  
        
        Route::get('/training-raya/middle-test-lk2', 'TrainingRaya\MiddleTestController@middle_test_lk2');  
        Route::get('/training-raya/middle-test-lkk', 'TrainingRaya\MiddleTestController@middle_test_lkk');  
        Route::get('/training-raya/middle-test-sc', 'TrainingRaya\MiddleTestController@middle_test_sc');  
        Route::post('/training-raya/middle-test', 'TrainingRaya\MiddleTestController@store_question_middle_test');   
        Route::get('/training-raya/middle-test/delete/{id}', 'TrainingRaya\MiddleTestController@delete_question_middle_test');   
        Route::post('/training-raya/middle-test/detail', 'TrainingRaya\MiddleTestController@detail_jawaban');   
        
        Route::get('/training-raya/final-test-lk2', 'TrainingRaya\FinalTestController@final_test_lk2');  
        Route::get('/training-raya/final-test-lkk', 'TrainingRaya\FinalTestController@final_test_lkk');  
        Route::get('/training-raya/final-test-sc', 'TrainingRaya\FinalTestController@final_test_sc');  
        Route::post('/training-raya/final-test', 'TrainingRaya\FinalTestController@store_question_final_test');   
        Route::get('/training-raya/final-test/delete/{id}', 'TrainingRaya\FinalTestController@delete_question_final_test');   
        Route::post('/training-raya/final-test/detail', 'TrainingRaya\FinalTestController@detail_jawaban');   
        
        Route::get('/training-raya/kelulusan-akhir-lk2', 'TrainingRaya\KelulusanAkhirController@kelulusan_akhir_lk2');    
        Route::get('/training-raya/kelulusan-akhir-lkk', 'TrainingRaya\KelulusanAkhirController@kelulusan_akhir_lkk');    
        Route::get('/training-raya/kelulusan-akhir-sc', 'TrainingRaya\KelulusanAkhirController@kelulusan_akhir_sc');
        
        Route::get('/training-raya/lulus-berkas/{id}', 'TrainingRaya\StatusLulusController@lulus_berkas');
        Route::get('/training-raya/tidak-lulus-berkas/{id}', 'TrainingRaya\StatusLulusController@tidak_lulus_berkas');
        
        Route::get('/training-raya/lulus-training/{id}', 'TrainingRaya\StatusLulusController@lulus_training');
        Route::get('/training-raya/tidak-lulus-training/{id}', 'TrainingRaya\StatusLulusController@tidak_lulus_training');
        
        Route::post('/training-raya/upload-plagiarism', 'TrainingRaya\PendaftarController@upload_plagiarism');

        Route::get('/training-raya/sudah-bayar/{id}', 'TrainingRaya\StatusBayarController@sudah_bayar');
    });
});

//Route::get('/daftar-training-raya', 'TrainingRaya\DaftarController@index');
//Route::post('/daftar-training-raya', 'TrainingRaya\DaftarController@store');

Route::group(['middleware' => ['auth', 'role:user-lk2|user-lkk|user-sc', 'verified']], function () {
    Route::get('/dashboard-training', 'TrainingRaya\DashboardController@index');
    Route::get('/dashboard-training/jurnal/{idUser}', 'TrainingRaya\JurnalController@show');
    Route::get('/dashboard-training/essay/{idUser}', 'TrainingRaya\JurnalController@show_essay');
    Route::get('/dashboard-training/sindikat-wajib/{idUser}', 'TrainingRaya\JurnalController@show_sindikat_wajib');
    Route::get('/dashboard-training/sindikat-pilihan/{idUser}', 'TrainingRaya\JurnalController@show_sindikat_pilihan');
    
    Route::post('/dashboard-training/upload-persyaratan', 'TrainingRaya\UploadPersyaratanController@store');
    
    Route::post('/dashboard-training/kirim-resume', 'TrainingRaya\KirimResumeController@store');

    Route::post('/dashboard-training/kirim-pretest', 'TrainingRaya\KirimResumeController@store_pretest');
    
    Route::post('/dashboard-training/kirim-respon-harian', 'TrainingRaya\KirimResponHarianController@store');
    
    Route::post('/dashboard-training/middle-test', 'TrainingRaya\KirimMiddleTestController@store');
    
    Route::post('/dashboard-training/final-test', 'TrainingRaya\KirimFinalTestController@store');
    
    Route::post('/dashboard-training/kirim-komentar/{idUser}', 'TrainingRaya\KomentarController@store');
    
    Route::post('/dashboard-training/selesai-screening', 'TrainingRaya\SelesaiScreeningController@store');
    
    Route::get('/absensi/{idKategori}/{idMateri}', 'TrainingRaya\AbsensiController@store');
});