<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class RecommendLetterController extends Controller
{
    public function pengajuanSurat()
    {
        $listPengajuan = DB::table('queue_recommend_letter')->get();

        return view('admin.recommend-letter.pengajuan-surat', compact('listPengajuan'));
    }

    public function templateSurat()
    {
        $template = DB::table('temp_recommend_letter')->first();

        return view('admin.recommend-letter.template-surat', compact('template'));
    }

    public function updateTemplateSurat(Request $request)
    {
        $input = $request->all();

        $template = DB::table('temp_recommend_letter')->where('id', 1)->first();

        (isset($input['image'])) ? $namaThumbnail = 'images/template-surat/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : true;

        if (!empty($input['image'])) {
            if (!empty($template->image)) {
                unlink(public_path($template->image));
            }
            $input['image']->move(public_path('images/template-surat'), $namaThumbnail);
        }

        DB::table('temp_recommend_letter')->where('id', 1)->update([
            'sekretariat' => $input['sekretariat'],
            'email' => $input['email'],
            'contact' => $input['contact'],
            'periode' => $input['periode'],
            'kabko' => $input['kabko'],
            'ketum' => $input['ketum'],
            'sekum' => $input['sekum'],
            'image' => $namaThumbnail ?? $template->image,
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah konten.', '');

        return back();
    }

    public function accBPL($id)
    {
        DB::table('queue_recommend_letter')->where('id', $id)->update([
            'approve_bpl' => 1,
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil menerima pengajuan.', '');

        return back();
    }

    public function accPA($id)
    {
        DB::table('queue_recommend_letter')->where('id', $id)->update([
            'approve_pa' => 1,
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil menerima pengajuan.', '');

        return back();
    }

    public function destroyPengajuanSurat($id)
    {
        DB::table('queue_recommend_letter')->where('id', $id)->delete();

        alert()->success('Berhasil menghapus pengajuan.', '');

        return back();
    }

    public function resetPengajuanSurat($id)
    {
        DB::table('queue_recommend_letter')->where('id', $id)->update([
            'approve_pa' => 0,
            'approve_bpl' => 0,
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil reset pengajuan.', '');

        return back();
    }
}
