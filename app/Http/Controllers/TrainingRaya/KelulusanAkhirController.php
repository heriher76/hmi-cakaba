<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class KelulusanAkhirController extends Controller
{
    public function kelulusan_akhir_lk2()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 1)->where('training_raya_status_lulus_daftar', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.kelulusan-akhir.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function kelulusan_akhir_lkk()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 2)->where('training_raya_status_lulus_daftar', 1)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.kelulusan-akhir.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function kelulusan_akhir_sc()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 3)->where('training_raya_status_lulus_daftar', 1)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.kelulusan-akhir.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }

    public function detail($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.training-raya.pendaftar.detail', compact('user'));
    }
}
