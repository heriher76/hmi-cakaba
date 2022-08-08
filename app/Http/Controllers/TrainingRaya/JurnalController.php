<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class JurnalController extends Controller
{
    public function show($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $tipe = 'jurnal';
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('tipe', $tipe)->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
    
    public function show_essay($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $tipe = 'essay';
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('tipe', $tipe)->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
    
    public function show_sindikat_wajib($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $tipe = 'sindikat wajib';
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('tipe', $tipe)->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }

    public function show_sindikat_pilihan($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $tipe = 'sindikat pilihan';
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('tipe', $tipe)->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
}
