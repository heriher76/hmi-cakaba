<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class KaderKomisariatController extends Controller
{
    public function index()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        $users = DB::table('users')->where('komisariat_lk', $komisariat->slug)->where('tidak_lk', null)->where('sudah_lk1', 1)->get();

        return view('admin.kader-komisariat.index', compact('komisariat', 'users'));
    }

    public function show($id)
    {
        $user = DB::table('users')->where('id', $id)->first();

        return view('admin.kader-komisariat.show', compact('user'));
    }
}
