<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminComputerController extends Controller
{
    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $computers = json_decode(json_encode(Http::get($url . '/computers')->json())) ?? [];

        return view('admin.computers.index', compact('computers'));
    }

    public function create(){

        return view('admin.computers.create');
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $response = Http::post($url . '/computers', $data);

        if ($response->successful()) {
            return redirect()->route('admin.computers.index')->with('success', 'Computador creado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $computer = json_decode(json_encode(Http::get($url . '/computers/' . $id)->json()));

        if (!$computer || !isset($computer->id)) {
            return redirect()->route('admin.computers.index')->with('error', 'El computador no fue encontrado.');
        }

        return view('admin.computers.show', compact('computer'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $computer = json_decode(json_encode(Http::get($url . '/computers/' . $id)->json()));

        if (!$computer || !isset($computer->id)) {
            return redirect()->route('admin.computers.index')->with('error', 'El computador no fue encontrado.');
        }

        return view('admin.computers.edit', compact('computer'));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        $response = Http::put($url . '/computers/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.computers.index')->with('success', 'Computador actualizado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/computers/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.computers.index')->with('success', 'Computador eliminado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
