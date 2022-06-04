<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Str;
use DB;

class KomisariatController extends Controller
{
    public function index()
    {
        $listKomisariat = DB::table('komisariat')->get();

        return view('admin.komisariat.index', compact('listKomisariat'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        (isset($input['image'])) ? $namaThumbnail = 'images/komisariat/'.Str::random(16).'.'.$input['image']->getClientOriginalExtension() : $namaThumbnail = null;

        $kataKunci = $input['slug'].'-'.Str::lower(Str::random(5));

        DB::table('komisariat')->insert([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'kata_kunci' => $kataKunci,
            'image' => $namaThumbnail,
            'buka_lk' => 0,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        if (!empty($input['image'])) {
            $input['image']->move(public_path('images/komisariat'), $namaThumbnail);
        }

        alert()->success('Berhasil menambahkan entitas.', '');

        return back();
    }

    public function edit($id)
    {
        $komisariat = DB::table('komisariat')->where('id', $id)->first();

        return view('admin.komisariat.edit', compact('komisariat'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();

        $komisariat = DB::table('komisariat')->where('id', $id)->first();

        (isset($input['image'])) ? $namaThumbnail = 'images/komisariat/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : true;

        if (!empty($input['image'])) {
            if (!empty($komisariat->image)) {
                unlink(public_path($komisariat->image));
            }
            $input['image']->move(public_path('images/komisariat'), $namaThumbnail);
        }

        DB::table('komisariat')->where('id', $id)->update([
            'name' => $input['name'],
            'slug' => $input['slug'],
            'image' => $namaThumbnail ?? $komisariat->image,
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah komisariat.', '');

        return back();
    }

    public function destroy($id)
    {
        $komisariat = DB::table('komisariat')->where('id', $id)->first();

        if (!empty($komisariat->image)) {
            unlink(public_path($komisariat->image));
        }

        DB::table('komisariat')->delete($id);
        
        alert()->info('Entitas Berhasil Dihapus!', '...');

        return back();
    }
}
