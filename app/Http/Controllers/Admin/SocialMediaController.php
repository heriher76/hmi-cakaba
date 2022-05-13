<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SocialMediaController extends Controller
{
    public function index()
    {
        $social = DB::table('social_media')->first();

        return view('admin.social-media.index', compact('social'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        DB::table('social_media')->where('id', 1)->update([
            'instagram' => $input['instagram'],
            'email' => $input['email'],
            'contact' => $input['contact'],
            'address' => $input['address'],
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah konten.', '');

        return back();
    }
}
