<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AreaController extends Controller
{
    private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index() { //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $areas = $this->fetchDataFromApi($url . '/areas');
        // return $areas;
        return view('areas.index', compact('areas'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $area = $this->fetchDataFromApi($url . '/areas/' . $id);

        return view('areas.show', compact('area'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $posts = Http::get($url .'/posts')->json();

        return view('areas.create',compact('posts'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/areas', $request->all());

        return redirect()->route('areas.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $area = $this->fetchDataFromApi($url . '/areas/' . $id);
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/areas/' . $id, $request->all());

        return redirect()->route('areas.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/areas/' . $id);
        return redirect()->route('areas.index');
    }
}
