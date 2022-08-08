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
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();
        $tipe = 'jurnal';

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
    
    public function show_essay($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();
        $tipe = 'essay';

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
    
    public function show_sindikat($id)
    {
        $jurnal = DB::table('users')->where('id', $id)->first();
        $list_komentar = DB::table('training_raya_komentar_jurnal')->where('user_pembuat_jurnal_id', $id)->orderBy('created_at', 'DESC')->get();
        $tipe = 'sindikat';

        return view('training-raya.dashboard.show-jurnal', compact('jurnal', 'list_komentar', 'tipe'));
    }
}
