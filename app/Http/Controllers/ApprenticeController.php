<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class ApprenticeController extends Controller
{
     private function fetchDataFromApi($url){
        $response = Http::get($url);
        return $response->json();
    }

    public function index() { //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $apprentices = $this->fetchDataFromApi($url . '/apprenticees');

        return view('apprentices.index', compact('apprentices'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $apprentice = $this->fetchDataFromApi($url . '/apprenticees/' . $id);

        return view('apprentices.show', compact('apprentice'));
    }
}
