<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;

class AbsensiController extends Controller
{
    public function landing($idKategori, $idMateri, $rand)
    {
        $list_user = DB::table("users")->where('training_raya_kategori_id', $idKategori)->where('training_raya_is_paid', 1)->where('training_raya_status_lulus_daftar', 1)->get();
        $materi = DB::table('training_raya_materi_forum')->where('id', $idMateri)->first();

        return view('admin.training-raya.absensi.landing-user', compact('list_user', 'materi', 'idKategori'));
    }
    public function store(Request $request, $idKategori, $idMateri, $rand)
    {
        $check = DB::table('training_raya_absensi')->where('user_id', $request->user_id)->where('training_raya_materi_forum_id', $idMateri)->where('training_raya_kategori_id', $idKategori)->first();

        if (!empty($check)) {
            alert()->info('Anda sudah absen', '');
            return redirect('/');
        }

        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', $idKategori)->where('id', $idMateri)->first();
        
        if (empty($materi)) {
            alert()->warning('Sepertinya anda salah link absen', '');
            return redirect('dashboard-training');
        }
        
        DB::table('training_raya_absensi')->insert([
            'user_id' => $request->user_id,
            'tanggal' => Carbon::now('Asia/Jakarta'),
            'training_raya_materi_forum_id' => $idMateri,
            'training_raya_kategori_id' => $idKategori,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ]);

        alert()->success('Absen Berhasil', '');
        return redirect('/');
    }
}
