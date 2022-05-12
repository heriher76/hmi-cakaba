<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('news_categories')->get();

        return view('admin.news-category.index', compact('categories'));
    }

    public function store(Request $request)
    {
        $input = $request->all();

        DB::table('news_categories')->insert([
            'name' => $input['name'],
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        alert()->success('Berhasil menambahkan kategori.', '');

        return back();
    }

    public function edit($id)
    {
        $category = DB::table('news_categories')->where('id', $id)->first();

        return view('admin.news-category.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        DB::table('news_categories')->where('id', $id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);

        alert()->success('Berhasil mengubah kategori.', '');
        return back();
    }

    public function destroy($id)
    {
        DB::table('news_categories')->where('id', $id)->delete();

        alert()->success('Berhasil menghapus kategori.', '');
        return back();
    }
}
