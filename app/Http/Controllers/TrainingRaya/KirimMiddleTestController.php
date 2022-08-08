<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class KirimMiddleTestController extends Controller
{
    public function store(Request $request)
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('tipe', 'middle')->where('training_raya_kategori_id', $request->training_raya_kategori_id)->get();

        foreach ($list_pertanyaan as $key => $pertanyaan) {
            DB::table('training_raya_user_question_test')->insert([
                'user_id' => Auth::user()->id,
                'training_raya_question_test_id' => $pertanyaan->id,
                'training_raya_kategori_id' => $request->training_raya_kategori_id,
                'jawaban' => $request->jawaban[$pertanyaan->id],
                'tipe' => 'middle',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }

        alert()->success('Berhasil kirim Middle Test', '');
        return back();
    }
}
