<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ResponHarianController extends Controller
{
    public function respon_harian_lk2()
    {
        $list_respon = DB::table('training_raya_respon_harian')->where('training_raya_respon_harian.training_raya_kategori_id', 1)->join('users', 'training_raya_respon_harian.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_respon_harian.*')->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.respon-harian.index', compact('list_respon', 'title', 'kategori_id'));
    }
    
    public function respon_harian_lkk()
    {
        $list_respon = DB::table('training_raya_respon_harian')->where('training_raya_respon_harian.training_raya_kategori_id', 2)->join('users', 'training_raya_respon_harian.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_respon_harian.*')->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.respon-harian.index', compact('list_respon', 'title', 'kategori_id'));
    }
    
    public function respon_harian_sc()
    {
        $list_respon = DB::table('training_raya_respon_harian')->where('training_raya_respon_harian.training_raya_kategori_id', 3)->join('users', 'training_raya_respon_harian.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_respon_harian.*')->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.respon-harian.index', compact('list_respon', 'title', 'kategori_id'));
    }
    
    public function delete_respon_harian($id)
    {
        DB::table('training_raya_respon_harian')->where('id', $id)->delete();

        alert()->info('Hapus respon berhasil', '');

        return back();
    }
}
