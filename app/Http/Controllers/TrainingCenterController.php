<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrainingCenterController extends Controller
{
private function fetchDataFromApi($url)
    {
        $response = Http::get($url);
        return $response->json();
    }

    public function index() { //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $trainingCenters = $this->fetchDataFromApi($url . '/training_centers');
        // return $trainingCenters;
        return view('training_centers.index', compact('trainingCenters'));
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $trainingCenter = $this->fetchDataFromApi($url . '/training_centers/' . $id);

        return view('training_centers.show', compact('trainingCenter'));
    }

    public function create()
    {
        $url = env('URL_SERVER_API');
        $posts = Http::get($url .'/posts')->json();

        return view('training_centers.create',compact('posts'));
    }

    public function store(Request $request)
    {
        $url = env('URL_SERVER_API');

        Http::post($url . '/training_centers', $request->all());

        return redirect()->route('training_centers.index');
    }

    public function edit($id)
    {
        $url = env('URL_SERVER_API');
        $trainingCenter = $this->fetchDataFromApi($url . '/training_centers/' . $id);
        return view('training_centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        $url = env('URL_SERVER_API');

        Http::put($url . '/training_centers/' . $id, $request->all());

        return redirect()->route('training_centers.index');
    }

      public function destroy($id)
    {
        $url = env('URL_SERVER_API');
        Http::delete($url . '/training_centers/' . $id);
        return redirect()->route('training_centers.index');
    }
}
