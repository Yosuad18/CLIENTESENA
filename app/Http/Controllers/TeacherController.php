<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TeacherController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index() { //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $teachers = $this->fetchDataFromApi($url . '/teachers');
        // return $teachers;
        return view('teachers.index', compact('teachers'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);

        return view('teachers.show', compact('teacher'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $posts = Http::get($url .'/posts')->json();

        return view('teachers.create',compact('posts'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/teachers', $request->all());

        return redirect()->route('teachers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $teacher = $this->fetchDataFromApi($url . '/teachers/' . $id);
        return view('teachers.edit', compact('teacher'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/teachers/' . $id, $request->all());

        return redirect()->route('teachers.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/teachers/' . $id);
        return redirect()->route('teachers.index');
    }
}
