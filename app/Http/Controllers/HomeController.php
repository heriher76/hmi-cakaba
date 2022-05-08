<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $sliders = DB::table('sliders')->get();
        $social = DB::table('social_media')->first();

        return view('index', compact('sliders', 'social'));
    }
}
