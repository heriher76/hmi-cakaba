<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class KirimResponHarianController extends Controller
{
    public function store(Request $request)
    {
        DB::table('training_raya_respon_harian')->insert([
            'jawaban' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'training_raya_kategori_id' => $request->training_raya_kategori_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil kirim respon harian', '');

        return back();
    }
}
