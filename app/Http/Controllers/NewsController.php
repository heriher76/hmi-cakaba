<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use DB;

class NewsController extends Controller
{
    public function index($categorySlug)
    {
        $pageNumber = $_GET['page'] ?? '1';

        try {
            $client = new Client();
            $response = $client->get(env('URL_API_NEWS', 'http://localhost/pembaharuan').'/api/news/'.$categorySlug.'?page='.$pageNumber); 
            $output = json_decode($response->getBody()->getContents());
        } catch (\Throwable $th) {
            //throw $th;
        }

        $allNews = $output->data ?? [];
        $popularNews = $output->popular ?? [];

        return view('news', compact('allNews', 'popularNews', 'categorySlug'));
    }

    public function show($categorySlug, $slug)
    {
        try {
            $client = new Client();
            $response = $client->get(env('URL_API_NEWS', 'http://localhost/pembaharuan').'/api/news/'.$categorySlug.'/'.$slug); 
            $output = json_decode($response->getBody()->getContents());
        } catch (\Throwable $th) {
            //throw $th;
        }

        $news = $output->data ?? [];
        $popularNews = $output->popular ?? [];

        return view('news-detail', compact('news', 'popularNews', 'categorySlug'));
    }
}
