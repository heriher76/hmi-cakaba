<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
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
        $slug_category = DB::table('news_categories')->get()->pluck('name')->toArray();
        
        $client = new Client();
        $response = $client->post(env('URL_API_NEWS', 'http://localhost/pembaharuan').'/api/news',
                    [
                        \GuzzleHttp\RequestOptions::JSON => 
                        ['slug_category' => $slug_category]
                    ],
                    ['Content-Type' => 'application/json']);

        $output = json_decode($response->getBody()->getContents());

        $allNews = $output->data;

        return view('index', compact('sliders', 'allNews'));
    }
}
