<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class KomentarController extends Controller
{
    public function store(Request $request, $id)
    {
        DB::table('training_raya_komentar_jurnal')->insert([
            'user_komentar_id' => \Auth::user()->id,
            'user_pembuat_jurnal_id' => $id,
            'komentar' => $request->komentar,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil kirim komentar', '');

        return back();
    }
}
