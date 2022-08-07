<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class PendaftarController extends Controller
{
    public function pendaftar_lk2()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 1)->whereIn('training_raya_status_lulus_daftar', [0,1])->where('training_raya_status_lulus_forum', 0)->get();
        $title = 'LK 2';
        $kategori_id = 1;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function pendaftar_lkk()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 2)->whereIn('training_raya_status_lulus_daftar', [0,1])->where('training_raya_status_lulus_forum', 0)->get();
        $title = 'LKK';
        $kategori_id = 2;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }
    
    public function pendaftar_sc()
    {
        $list_pendaftar = DB::table('users')->where('training_raya_kategori_id', 3)->whereIn('training_raya_status_lulus_daftar', [0,1])->where('training_raya_status_lulus_forum', 0)->get();
        $title = 'SC';
        $kategori_id = 3;

        return view('admin.training-raya.pendaftar.index', compact('list_pendaftar', 'title', 'kategori_id'));
    }

    public function detail($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.training-raya.pendaftar.detail', compact('user'));
    }

    public function upload_plagiarism(Request $request)
    {
        $input = $request->all();

        $user = DB::table('users')->where('id', $request->user_id)->first();

        (isset($input['ss_hasil_plagiarism'])) ? $namaThumbnail = 'training-raya/ss-plagiarism/'.\Str::random(16).'.'.$input['ss_hasil_plagiarism']->getClientOriginalExtension() : true;

        if (!empty($input['ss_hasil_plagiarism'])) {
            if (!empty($user->ss_hasil_plagiarism)) {
                unlink(public_path($user->ss_hasil_plagiarism));
            }
            $input['ss_hasil_plagiarism']->move(public_path('training-raya/ss-plagiarism'), $namaThumbnail);
        }

        DB::table('users')->where('id', $request->user_id)->update([
            'ss_hasil_plagiarism' => $namaThumbnail ?? $user->ss_hasil_plagiarism
        ]);

        alert()->success('Berhasil upload SS plagiarism', '');
        return back();
    }
}
