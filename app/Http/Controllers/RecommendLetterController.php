<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use go2hi\go2hi;
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
            'number_letter' => null,
            'type_training' => $request->type_training,
            'title_training' => $request->title_training,
            'date_training' => $request->date_training,
            'cabang_training' => $request->cabang_training,
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

        ///////
        $dateHijri = go2hi::date('d F Y', go2hi::GO2HI_HIJRI, strtotime(Carbon::now()->format('Y-m-d')));
        $dateGregor = go2hi::date('d F Y', 0, 0, 1);

        ///////
        $yearHijri = go2hi::date('Y', go2hi::GO2HI_HIJRI, strtotime(Carbon::now()->format('Y')));
        $monthHijri = go2hi::date('m', go2hi::GO2HI_HIJRI, strtotime(Carbon::now()->format('m')));

        $numberLetter = $queue->number_letter.'/A/SEK/'.$monthHijri.'/'.$yearHijri;
        
        return view('pdf.surat-rekomendasi', compact('template', 'queue', 'numberLetter', 'dateHijri', 'dateGregor'));
    }
}
