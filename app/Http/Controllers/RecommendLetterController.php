<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Alert;
use PDF;
use DB;

class RecommendLetterController extends Controller
{
    public function index()
    {
        if (empty(auth()->user()->alamat_asal) || empty(auth()->user()->alamat_sekarang)) {
            alert()->warning('Silahkan isi data profil anda terlebih dahulu', '');

            return redirect('my-profile');
        }

        $myQueue = DB::table('queue_recommend_letter')->where('user_id', auth()->user()->id)->get();

        return view('recommend-letter', compact('myQueue'));
    }

    public function store(Request $request)
    {
        DB::table('queue_recommend_letter')->insert([
            'user_id' => auth()->user()->id,
            'type_training' => $request->type_training,
            'title_training' => $request->title_training,
            'date_training' => $request->date_training,
            'approve_bpl' => 0,
            'approve_pa' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        Alert::success('Pengajuan Berhasil', 'Silahkan tunggu persetujuan dari BPL dan pengurus cabang.');

        return back();
    }

    public function export(Request $request)
    {
        $queue = DB::table('queue_recommend_letter')->where('id', $request->id_surat)->first();

        $template = DB::table('temp_recommend_letter')->first();

        // $pdf = PDF::loadview('pdf.surat-rekomendasi', ['template' => $template, 'queue' => $queue])
        //         ->setPaper('legal');
        
        return view('pdf.surat-rekomendasi', compact('template', 'queue'));
    }
}
