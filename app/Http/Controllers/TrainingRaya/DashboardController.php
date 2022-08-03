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
                                    ->leftJoin('training_raya_kartu_screening', 'training_raya_materi_screening.id', '=', 'training_raya_kartu_screening.training_raya_materi_screening_id')
                                    ->select('training_raya_materi_screening.*', 'training_raya_kartu_screening.status')
                                    ->get();

        $list_screener = DB::table('training_raya_screener')->where('training_raya_kategori_id', $me->training_raya_kategori_id)->get();

        $all_materi_screening = DB::table('training_raya_materi_screening')
                                    ->where('training_raya_kategori_id', $me->training_raya_kategori_id)
                                    ->get();
                                    
        $list_jurnal = DB::table('users')->where('training_raya_kategori_id', $me->training_raya_kategori_id)
                                    ->get();
        
        $list_absen_saya = DB::table('training_raya_absensi')->where('user_id', $me->id)->get();
                                    
        return view('training-raya.dashboard.index', compact('me', 'list_informasi', 'list_materi_screening', 'list_screener', 'all_materi_screening', 'list_jurnal', 'list_absen_saya'));
    }
}
