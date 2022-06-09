<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class OpsiKomisariatController extends Controller
{
    public function index()
    {
        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        return view('admin.opsi-komisariat.index', compact('komisariat'));
    }

    public function update(Request $request)
    {
        $input = $request->all();

        $komisariat = DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->first();

        (isset($input['image'])) ? $namaThumbnail = 'images/komisariat/'.\Str::random(16).'.'.$input['image']->getClientOriginalExtension() : true;

        if (!empty($input['image'])) {
            if (!empty($komisariat->image)) {
                unlink(public_path($komisariat->image));
            }
            $input['image']->move(public_path('images/komisariat'), $namaThumbnail);
        }

        if (!empty($input['buka_lk'])) {
            $bukaLK = 1;
        }else{
            $bukaLK = 0;
        }

        DB::table('komisariat')->where('id', auth()->user()->admin_id_komisariat)->update([
            'name' => $input['name'],
            'image' => $namaThumbnail ?? $komisariat->image,
            'buka_lk' => $bukaLK,
            'grup_lk' => $input['grup_lk'],
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil mengubah opsi.', '');

        return back();
    }
}
