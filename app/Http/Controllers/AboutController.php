<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AboutController extends Controller
{
    public function tentang()
    {
        $about = DB::table('about')->first();

        return view('tentang', compact('about'));
    }

    public function visimisi()
    {
        $about = DB::table('about')->first();
        $tempLetter = DB::table('temp_recommend_letter')->first();

        return view('visimisi', compact('about', 'tempLetter'));
    }

    public function proker()
    {
        $about = DB::table('about')->first();

        return view('proker', compact('about'));
    }
}
