<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url){
        $response = Http::get($url);
        return $response->json();
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $teachers = $this->fetchDataFromApi($url . '/teachers');

        return view('teachers.index', compact('teachers'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.show', compact('teacher'));
    }
}
