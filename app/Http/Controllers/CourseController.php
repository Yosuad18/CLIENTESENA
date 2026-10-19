<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CourseController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return json_decode(json_encode($response->json()));
    }

    public function index() { //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $courses = $this->fetchDataFromApi($url . '/courses');
        // return $courses;
        return view('courses.index', compact('courses'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $course = $this->fetchDataFromApi($url . '/courses/' . $id);

        return view('courses.show', compact('course'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $posts = Http::get($url .'/posts')->json();

        return view('courses.create',compact('posts'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/courses', $request->all());

        return redirect()->route('courses.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $course = $this->fetchDataFromApi($url . '/courses/' . $id);
        return view('courses.edit', compact('course'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/courses/' . $id, $request->all());

        return redirect()->route('courses.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/courses/' . $id);
        return redirect()->route('courses.index');
    }
}
