<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private function fetchDataFromApi($url){
        $response = Http::get($url);
        return $response->json();
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses');

        return view('courses.index', compact('courses'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('courses.show', compact('course'));
    }
}
