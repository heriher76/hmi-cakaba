<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class AboutController extends Controller
{
    public function index()
    {
        $about = DB::table('about')->first();

        return view('admin.hmi-cakaba.about', compact('about'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $about = DB::table('about')->where('id', 1)->first();

        (isset($input['image'])) ? $namaThumbnail = 'images/about/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : true;

        if (!empty($input['image'])) {
            if (!empty($about->image)) {
                unlink(public_path($about->image));
            }
            $input['image']->move(public_path('images/about'), $namaThumbnail);
        }

        DB::table('about')->where('id', 1)->update([
            'visi' => $input['visi'],
            'misi' => $input['misi'],
            'profile' => $input['profile'],
            'proker' => $input['proker'],
            'image' => $namaThumbnail ?? $about->image,
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah konten.', '');

        return back();
    }
}
