<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminAreaController extends Controller
{
    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $areas = json_decode(json_encode(Http::get($url . '/areas')->json())) ?? [];

        return view('admin.areas.index', compact('areas'));
    }

    public function create(){

        return view('admin.areas.create');
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $response = Http::post($url . '/areas', $data);

        if ($response->successful()) {
            return redirect()->route('admin.areas.index')->with('success', 'Área creada correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $area = json_decode(json_encode(Http::get($url . '/areas/' . $id)->json()));

        if (!$area || !isset($area->id)) {
            return redirect()->route('admin.areas.index')->with('error', 'El área no fue encontrada.');
        }

        return view('admin.areas.show', compact('area'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $area = json_decode(json_encode(Http::get($url . '/areas/' . $id)->json()));

        if (!$area || !isset($area->id)) {
            return redirect()->route('admin.areas.index')->with('error', 'El área no fue encontrada.');
        }

        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $response = Http::put($url . '/areas/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.areas.index')->with('success', 'Área actualizada correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/areas/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.areas.index')->with('success', 'Área eliminada correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
