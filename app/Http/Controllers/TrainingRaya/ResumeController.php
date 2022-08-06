<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class ResumeController extends Controller
{
    public function resume_lk2()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 1)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.resume.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function resume_lk2_list_data($idMateri)
    {
        $list_resume = DB::table('training_raya_resume')->where('training_raya_resume.training_raya_kategori_id', 1)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_resume.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_resume.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 1)->where('id', $idMateri)->first();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.resume.list-data', compact('list_resume', 'title', 'kategori_id', 'materi'));
    }
    
    public function resume_lkk()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 2)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.resume.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function resume_lkk_list_data($idMateri)
    {
        $list_resume = DB::table('training_raya_resume')->where('training_raya_resume.training_raya_kategori_id', 2)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_resume.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_resume.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 2)->where('id', $idMateri)->first();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.resume.list-data', compact('list_resume', 'title', 'kategori_id', 'materi'));
    }
    
    public function resume_sc()
    {
        $list_materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 3)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.resume.index', compact('list_materi', 'title', 'kategori_id'));
    }

    public function resume_sc_list_data($idMateri)
    {
        $list_resume = DB::table('training_raya_resume')->where('training_raya_resume.training_raya_kategori_id', 3)->where('training_raya_materi_forum_id', $idMateri)->join('users', 'training_raya_resume.user_id', '=', 'users.id')->select('users.name as nama_user', 'training_raya_resume.*')->get();
        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', 3)->where('id', $idMateri)->first();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.resume.list-data', compact('list_resume', 'title', 'kategori_id', 'materi'));
    }

    public function delete_resume($id)
    {
        DB::table('training_raya_resume')->where('id', $id)->delete();

        alert()->info('Hapus resume berhasil', '');

        return back();
    }
}
