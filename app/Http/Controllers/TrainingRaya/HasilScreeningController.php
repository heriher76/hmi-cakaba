<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HasilScreeningController extends Controller
{
    public function hasil_screening_lk2()
    {
        $list_users = DB::table('users')->where('training_raya_is_paid', 1)->where('training_raya_status_lulus_daftar', 1)->where('training_raya_kategori_id', 1)->get();

        $jumlah_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 1)->count();

        foreach($list_users as $user) {
            $jumlah_selesai = DB::table('training_raya_kartu_screening')->where('user_id', $user->id)->count();
            
            $user->jumlah_selesai = $jumlah_selesai.' / '.$jumlah_materi;
        }

        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.hasil-screening.index', compact('list_users', 'title', 'kategori_id'));
    }

    public function hasil_screening_lk2_list_data($idUser)
    {
        $list_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 1)->get();

        foreach ($list_materi as $key => $materi) {
            $bukti = DB::table('training_raya_kartu_screening')->where('user_id', $idUser)->where('training_raya_materi_screening_id', $materi->id)->first();

            if (!empty($bukti)) {
                $materi->bukti = $bukti;
            }
        }

        $user = DB::table('users')->where('training_raya_kategori_id', 1)->where('id', $idUser)->first();
        
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.hasil-screening.list-data', compact('list_materi', 'title', 'kategori_id', 'user'));
    }
    
    public function hasil_screening_lkk()
    {
        $list_users = DB::table('users')->where('training_raya_is_paid', 1)->where('training_raya_status_lulus_daftar', 1)->where('training_raya_kategori_id', 2)->get();

        $jumlah_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 2)->count();

        foreach($list_users as $user) {
            $jumlah_selesai = DB::table('training_raya_kartu_screening')->where('user_id', $user->id)->count();
            
            $user->jumlah_selesai = $jumlah_selesai.' / '.$jumlah_materi;
        }

        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.hasil-screening.index', compact('list_users', 'title', 'kategori_id'));
    }

    public function hasil_screening_lkk_list_data($idUser)
    {
        $list_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 2)->get();

        foreach ($list_materi as $key => $materi) {
            $bukti = DB::table('training_raya_kartu_screening')->where('user_id', $idUser)->where('training_raya_materi_screening_id', $materi->id)->first();

            if (!empty($bukti)) {
                $materi->bukti = $bukti;
            }
        }

        $user = DB::table('users')->where('training_raya_kategori_id', 2)->where('id', $idUser)->first();
        
        $title = 'LKK';
        $kategori_id = 2;
        
        return view('admin.training-raya.hasil-screening.list-data', compact('list_materi', 'title', 'kategori_id', 'user'));
    }

    public function hasil_screening_sc()
    {
        $list_users = DB::table('users')->where('training_raya_is_paid', 1)->where('training_raya_status_lulus_daftar', 1)->where('training_raya_kategori_id', 3)->get();

        $jumlah_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 3)->count();

        foreach($list_users as $user) {
            $jumlah_selesai = DB::table('training_raya_kartu_screening')->where('user_id', $user->id)->count();
            
            $user->jumlah_selesai = $jumlah_selesai.' / '.$jumlah_materi;
        }

        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.hasil-screening.index', compact('list_users', 'title', 'kategori_id'));
    }

    public function hasil_screening_sc_list_data($idUser)
    {
        $list_materi = DB::table('training_raya_materi_screening')->where('training_raya_kategori_id', 3)->get();

        foreach ($list_materi as $key => $materi) {
            $bukti = DB::table('training_raya_kartu_screening')->where('user_id', $idUser)->where('training_raya_materi_screening_id', $materi->id)->first();

            if (!empty($bukti)) {
                $materi->bukti = $bukti;
            }
        }

        $user = DB::table('users')->where('training_raya_kategori_id', 3)->where('id', $idUser)->first();
        
        $title = 'SC';
        $kategori_id = 3;
        
        return view('admin.training-raya.hasil-screening.list-data', compact('list_materi', 'title', 'kategori_id', 'user'));
    }

    public function delete_hasil_screening($id)
    {
        $bukti = DB::table('training_raya_kartu_screening')->where('id', $id)->first();

        if (!empty($bukti->bukti_foto)) {
            if (file_exists(public_path().'/'.$bukti->bukti_foto)) {
                unlink(public_path($bukti->bukti_foto));
            }
        }

        DB::table('training_raya_kartu_screening')->where('id', $id)->delete();

        alert()->info('Hapus Bukti berhasil', '');

        return back();
    }
}
