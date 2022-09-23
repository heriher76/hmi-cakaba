<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
        $me = Auth::user();

        $list_informasi = DB::table('training_raya_informasi')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->get();

        $list_materi_screening = DB::table('training_raya_materi_screening')
                                    ->where('training_raya_materi_screening.training_raya_kategori_id', $me->training_raya_kategori_id)
                                    ->get();

        $list_screener = DB::table('training_raya_screener')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->get();

        $my_resume = DB::table('training_raya_resume')
                        ->where('training_raya_resume.training_raya_kategori_id', $me->training_raya_kategori_id)->where('user_id', $me->id)
                        ->join('training_raya_materi_forum', 'training_raya_resume.training_raya_materi_forum_id', '=', 'training_raya_materi_forum.id')
                        ->select('training_raya_resume.*', 'training_raya_materi_forum.nama')
                        ->get();
                        
        $all_materi_forum = DB::table('training_raya_materi_forum')
                                    ->where('training_raya_kategori_id', $me->training_raya_kategori_id)
                                    ->get();
                                    
        $list_jurnal = DB::table('users')->where('training_raya_kategori_id', $me->training_raya_kategori_id)
                                    ->get();
        
        $list_absen_saya = DB::table('training_raya_absensi')->where('user_id', $me->id)->get();

        $list_pertanyaan_middle_test = DB::table('training_raya_question_test')->where('tipe', 'middle')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->get();
        
        $list_pertanyaan_final_test = DB::table('training_raya_question_test')->where('tipe', 'final')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->get();
                                    
        return view('training-raya.dashboard.index', compact('me', 'list_informasi', 'list_materi_screening', 'list_screener', 'all_materi_forum', 'list_jurnal', 'list_absen_saya', 'my_resume', 'list_pertanyaan_middle_test', 'list_pertanyaan_final_test'));
    }
}
