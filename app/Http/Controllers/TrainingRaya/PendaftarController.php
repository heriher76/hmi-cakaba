<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PendaftarController extends Controller
{
    public function pendaftar_lk2()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function pendaftar_lkk()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function pendaftar_sc()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
}
