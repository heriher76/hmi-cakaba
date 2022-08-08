<?php

namespace App\Http\Controllers\TrainingRaya;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class MiddleTestController extends Controller
{
    public function middle_test_lk2()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 1)->where('tipe', 'middle')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 1)->where('tipe', 'middle')->select('user_id')->distinct()->get();
        $title = 'LK 2';
        $tipe = 'middle';
        $kategori_id = 1;
        
        return view('admin.training-raya.middle-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }
    
    public function middle_test_lkk()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 2)->where('tipe', 'middle')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 2)->where('tipe', 'middle')->select('user_id')->distinct()->get();
        $title = 'LKK';
        $tipe = 'middle';
        $kategori_id = 2;
        
        return view('admin.training-raya.middle-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }
    
    public function middle_test_sc()
    {
        $list_pertanyaan = DB::table('training_raya_question_test')->where('training_raya_kategori_id', 3)->where('tipe', 'middle')->get();
        $list_jawaban = DB::table('training_raya_user_question_test')->where('training_raya_kategori_id', 3)->where('tipe', 'middle')->select('user_id')->distinct()->get();
        $title = 'SC';
        $tipe = 'middle';
        $kategori_id = 3;
        
        return view('admin.training-raya.middle-test.index', compact('list_pertanyaan', 'list_jawaban', 'title', 'kategori_id', 'tipe'));
    }

    public function store_question_middle_test(Request $request)
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

    public function delete_question_middle_test($id)
    {
        DB::table('training_raya_question_test')->where('id', $id)->delete();

        alert()->info('Hapus pertanyaan berhasil', '');

        return back();
    }
    
    public function detail_jawaban(Request $request)
    {
        $list_jawaban = DB::table('training_raya_user_question_test')->where('tipe', 'middle')->where('user_id', $request->user_id)->orderBy('created_at', 'DESC')->get();

        return view('admin.training-raya.middle-test.detail_jawaban', compact('list_jawaban'));
    }
}
