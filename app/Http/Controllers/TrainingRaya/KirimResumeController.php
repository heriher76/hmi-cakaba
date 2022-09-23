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
        $input = $request->all();
        (isset($input['file_tugas'])) ? $namaThumbnail = 'training-raya/file-tugas/'.\Str::random(16).'.'.$input['file_tugas']->getClientOriginalExtension() : true;
        
        if (!empty($input['file_tugas'])) {
            $input['file_tugas']->move(public_path('training-raya/file-tugas'), $namaThumbnail);
            if(!empty($input['apakah_video'])) {
                $data_file = '<iframe width="420" height="315"
                    src="'.url($namaThumbnail).'" sandbox>
                    </iframe>';
            }else{
                $data_file = '<img src="'.url($namaThumbnail).'" class="img-responsive">';
            }
        }
        
        DB::table('training_raya_resume')->insert([
            'judul' => $request->judul_resume,
            'deskripsi' => $data_file ?? $request->deskripsi,
            'user_id' => Auth::user()->id,
            'training_raya_materi_forum_id' => $request->training_raya_materi_forum,
            'training_raya_kategori_id' => $request->training_raya_kategori_id,
            'kategori' => $request->training_raya_sc_kategori_tugas ?? 'resume',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil kirim tugas', '');

        return back();
    }

    public function store_pretest(Request $request)
    {
        DB::table('training_raya_resume')->insert([
            'judul' => $request->judul_resume,
            'deskripsi' => $request->deskripsi,
            'user_id' => Auth::user()->id,
            'training_raya_materi_forum_id' => $request->training_raya_materi_forum,
            'training_raya_kategori_id' => $request->training_raya_kategori_id,
            'kategori' => 'pretest',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil kirim pretest', '');

        return back();
    }
}
