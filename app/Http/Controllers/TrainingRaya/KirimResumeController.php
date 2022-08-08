<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use DB;

class KirimResumeController extends Controller
{
    public function store(Request $request)
    {
        DB::table('training_raya_resume')->insert([
            'judul' => $request->judul_resume,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'training_raya_materi_forum_id' => $request->training_raya_materi_forum,
            'training_raya_kategori_id' => $request->training_raya_kategori_id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil kirim resume', '');

        return back();
    }
}
