<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SelesaiScreeningController extends Controller
{
    public function store(Request $request)
    {   
        $input = $request->all();

        $me = \Auth::user();

        $check = DB::table('training_raya_kartu_screening')->where('user_id', $me->id)->where('training_raya_materi_screening_id', $request->materi_id)->where('training_raya_kategori_id', $me->training_raya_kategori_id)->first();

        (isset($input['bukti_foto'])) ? $namaThumbnail = 'training-raya/bukti-foto-screening/'.\Str::random(16).'.'.$input['bukti_foto']->getClientOriginalExtension() : true;
        
        if (!empty($input['bukti_foto'])) {
            if (!empty($check->bukti_foto)) {
                unlink(public_path($check->bukti_foto));
            }
            $input['bukti_foto']->move(public_path('training-raya/bukti-foto-screening'), $namaThumbnail);
        }

        if(!empty($check)) {
            DB::table('training_raya_kartu_screening')->where('id', $check->id)->update([
                'training_raya_screener_id' => $request->training_raya_screener,
                'status' => 1,
                'bukti_foto' => $namaThumbnail,
                'updated_at' => Carbon::now(),
            ]);
        }else{
            DB::table('training_raya_kartu_screening')->insert([
                'user_id' => $me->id,
                'training_raya_materi_screening_id' => $request->materi_id,
                'training_raya_screener_id' => $request->training_raya_screener,
                'status' => 1,
                'bukti_foto' => $namaThumbnail,
                'training_raya_kategori_id' => $request->training_raya_kategori_id,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        }

        alert()->success('Berhasil menandai selesai', '');
        return back();
    }
}
