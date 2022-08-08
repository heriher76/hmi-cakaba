<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use Auth;

class AbsensiController extends Controller
{
    public function store($idKategori, $idMateri)
    {
        $check = DB::table('training_raya_absensi')->where('user_id', Auth::user()->id)->where('training_raya_materi_forum_id', $idMateri)->where('training_raya_kategori_id', $idKategori)->first();

        if (!empty($check)) {
            alert()->info('Anda sudah absen', '');
            return redirect('dashboard-training');
        }

        $materi = DB::table('training_raya_materi_forum')->where('training_raya_kategori_id', $idKategori)->where('id', $idMateri)->first();
        
        if (empty($materi)) {
            alert()->warning('Sepertinya anda salah link absen', '');
            return redirect('dashboard-training');
        }
        
        DB::table('training_raya_absensi')->insert([
            'user_id' => Auth::user()->id,
            'tanggal' => Carbon::now('Asia/Jakarta'),
            'training_raya_materi_forum_id' => $idMateri,
            'training_raya_kategori_id' => $idKategori,
            'created_at' => Carbon::now('Asia/Jakarta'),
            'updated_at' => Carbon::now('Asia/Jakarta'),
        ]);

        alert()->success('Absen Berhasil', '');
        return redirect('dashboard-training');
    }
}
