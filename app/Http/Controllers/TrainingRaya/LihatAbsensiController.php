<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class LihatAbsensiController extends Controller
{
    public function absensi_lk2()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.absensi.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function absensi_lk2_list_data($idMateri)
    {   
        $list_absensi = DB::table('training_raya_absensi')->where('training_raya_absensi.training_raya_kategori_id', 1)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_absensi.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_absensi.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 1)->where('id', $idMateri)->first();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.absensi.list-data', compact('list_absensi', 'title', 'kategori_id', 'materi'));
    }
    
    public function absensi_lkk()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.absensi.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function absensi_lkk_list_data($idMateri)
    {   
        $list_absensi = DB::table('training_raya_absensi')->where('training_raya_absensi.training_raya_kategori_id', 2)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_absensi.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_absensi.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 2)->where('id', $idMateri)->first();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.absensi.list-data', compact('list_absensi', 'title', 'kategori_id', 'materi'));
    }
    
    public function absensi_sc()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.absensi.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function absensi_sc_list_data($idMateri)
    {   
        $list_absensi = DB::table('training_raya_absensi')->where('training_raya_absensi.training_raya_kategori_id', 3)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_absensi.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_absensi.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 3)->where('id', $idMateri)->first();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.absensi.list-data', compact('list_absensi', 'title', 'kategori_id', 'materi'));
    }
    
    public function delete_absensi($id)
    {
        DB::table('training_raya_absensi')->where('id', $id)->delete();

        alert()->info('Hapus absensi berhasil', '');

        return back();
    }
}
