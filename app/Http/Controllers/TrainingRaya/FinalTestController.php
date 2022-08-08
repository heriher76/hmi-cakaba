<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;

class FinalTestController extends Controller
{
    public function final_test_lk2()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 1)->where('tipe', 'final')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 1)->where('tipe', 'final')->select('user_id')->distinct()->get();
        $title = 'LK 2';
        $tipe = 'final';
        $kategori_id = 1;
        
        return view('admin.training-raya.final-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }
    
    public function final_test_lkk()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 2)->where('tipe', 'final')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 2)->where('tipe', 'final')->select('user_id')->distinct()->get();
        $title = 'LKK';
        $tipe = 'final';
        $kategori_id = 2;
        
        return view('admin.training-raya.final-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }
    
    public function final_test_sc()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 3)->where('tipe', 'final')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 3)->where('tipe', 'final')->select('user_id')->distinct()->get();
        $title = 'SC';
        $tipe = 'final';
        $kategori_id = 3;
        
        return view('admin.training-raya.final-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }

    public function store_question_final_test(Request $request)
    {
        DB::table('training_raya_question_test')->insert([
           'pertanyaan' => $request->pertanyaan,
           'training_raya_kategori_id' => $request->training_raya_kategori_id,
           'tipe' => $request->tipe,
           'created_at' => Carbon::now(),
           'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil menambah Pertanyaan', '');

        return back();
    }

    public function delete_question_final_test($id)
    {
        DB::table('training_raya_question_test')->where('id', $id)->delete();

        alert()->info('Hapus pertanyaan berhasil', '');

        return back();
    }
    
    public function detail_jawaban(Request $request)
    {
        $list_jawaban = DB::table('training_raya_user_question_test')->where('tipe', 'final')->where('user_id', $request->user_id)->orderBy('created_at', 'DESC')->get();

        return view('admin.training-raya.final-test.detail_jawaban', compact('list_jawaban'));
    }
}
