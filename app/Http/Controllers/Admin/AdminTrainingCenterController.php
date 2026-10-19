<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminTrainingCenterController extends Controller
{
    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $trainingCenters = json_decode(json_encode(Http::get($url . '/training-centers')->json())) ?? [];

        return view('admin.training_centers.index', compact('trainingCenters'));
    }

    public function create(){

        return view('admin.training_centers.create');
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        $response = Http::post($url . '/training-centers', $data);

        if ($response->successful()) {
            return redirect()->route('admin.training-centers.index')->with('success', 'Centro de formación creado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $trainingCenter = json_decode(json_encode(Http::get($url . '/training-centers/' . $id)->json()));

        if (!$trainingCenter || !isset($trainingCenter->id)) {
            return redirect()->route('admin.training-centers.index')->with('error', 'El centro de formación no fue encontrado.');
        }

        return view('admin.training_centers.show', compact('trainingCenter'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $trainingCenter = json_decode(json_encode(Http::get($url . '/training-centers/' . $id)->json()));

        if (!$trainingCenter || !isset($trainingCenter->id)) {
            return redirect()->route('admin.training-centers.index')->with('error', 'El centro de formación no fue encontrado.');
        }

        return view('admin.training_centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        $response = Http::put($url . '/training-centers/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.training-centers.index')->with('success', 'Centro de formación actualizado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/training-centers/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.training-centers.index')->with('success', 'Centro de formación eliminado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
