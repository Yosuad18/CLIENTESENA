<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    private function fetchDataFromApi($url){
        $response = Http::get($url);
        return $response->json();
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');

        return view('areas.index', compact('areas'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.show', compact('area'));
    }
}
