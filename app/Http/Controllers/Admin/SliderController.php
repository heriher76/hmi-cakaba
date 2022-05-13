<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = DB::table('sliders')->get();

        return view('admin.slider.index', compact('sliders'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        (isset($input['image'])) ? $namaThumbnail = 'images/slider/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : $namaThumbnail = null;

        DB::table('sliders')->insert([
            'title' => $input['title'],
            'description' => $input['description'],
            'url' => $input['url'],
            'image' => $namaThumbnail,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if (!empty($input['image'])) {
            $input['image']->move(public_path('images/slider'), $namaThumbnail);
        }

        alert()->success('Berhasil menambahkan slider.', '');

        return back();
    }

    public function edit($id)
    {
        $slider = DB::table('sliders')->where('id', $id)->first();

        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $slider = DB::table('sliders')->where('id', $id)->first();

        (isset($input['image'])) ? $namaThumbnail = 'images/slider/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : true;

        if (!empty($input['image'])) {
            if (!empty($slider->image)) {
                unlink(public_path($slider->image));
            }
            $input['image']->move(public_path('images/slider'), $namaThumbnail);
        }

        DB::table('sliders')->where('id', $id)->update([
            'title' => $input['title'],
            'description' => $input['description'],
            'url' => $input['url'],
            'image' => $namaThumbnail ?? $slider->image,
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah slider.', '');

        return back();
    }

    public function destroy($id)
    {
        $slider = DB::table('sliders')->where('id', $id)->first();

        if (!empty($slider->image)) {
            unlink(public_path($slider->image));
        }

        DB::table('sliders')->delete($id);
        
        alert()->info('Slider Berhasil Dihapus!', '...');

        return back();
    }
}
