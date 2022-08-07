<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StatusLulusController extends Controller
{
    public function lulus_berkas($id)
    {
        DB::table('users')->where('id', $id)->update([
            'training_raya_status_lulus_daftar' => 1
        ]);

        alert()->success('Berhasil Verifikasi Lulus Berkas', '');
        return back();
    }
    
    public function tidak_lulus_berkas($id)
    {
        DB::table('users')->where('id', $id)->update([
            'training_raya_status_lulus_daftar' => 2
        ]);

        alert()->info('Berhasil Verifikasi Tidak Lulus Berkas', '');
        return back();
    }
    
    public function lulus_training($id)
    {
        DB::table('users')->where('id', $id)->update([
            'training_raya_status_lulus_forum' => 1
        ]);

        alert()->success('Berhasil Verifikasi Lulus Training', '');
        return back();
    }
    
    public function tidak_lulus_training($id)
    {
        DB::table('users')->where('id', $id)->update([
            'training_raya_status_lulus_forum' => 2
        ]);

        alert()->info('Berhasil Verifikasi Tidak Lulus Training', '');
        return back();
    }
}
