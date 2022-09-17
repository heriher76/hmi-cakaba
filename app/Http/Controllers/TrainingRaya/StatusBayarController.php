<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class StatusBayarController extends Controller
{
    public function sudah_bayar($id)
    {
        DB::table('users')->where('id', $id)->update([
            'training_raya_is_paid' => 1
        ]);

        alert()->success('Berhasil Verifikasi LUNAS', '');
        return back();
    }
}
