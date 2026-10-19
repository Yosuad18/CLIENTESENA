<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminApprenticeController extends Controller
{
    private function relations()
    {
        $url = env('URL_SERVER_API');

        return [
            'courses' => json_decode(json_encode(Http::get($url . '/courses')->json())) ?? [],
            'computers' => json_decode(json_encode(Http::get($url . '/computers')->json())) ?? [],
        ];
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $apprentices = json_decode(json_encode(Http::get($url . '/apprentices?included=course,computer')->json())) ?? [];

        return view('admin.apprentices.index', compact('apprentices'));
    }

    public function create(){

        $relations = $this->relations();

        return view('admin.apprentices.create', $relations);
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'document' => 'nullable|string|max:255',
            'estrato' => 'nullable|integer|min:1|max:6',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id' => 'required',
            'computer_id' => 'nullable',
        ]);

        $response = Http::post($url . '/apprentices', $data);

        if ($response->successful()) {
            return redirect()->route('admin.apprentices.index')->with('success', 'Aprendiz creado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $apprentice = json_decode(json_encode(Http::get($url . '/apprentices/' . $id . '?included=course,computer')->json()));

        if (!$apprentice || !isset($apprentice->id)) {
            return redirect()->route('admin.apprentices.index')->with('error', 'El aprendiz no fue encontrado.');
        }

        return view('admin.apprentices.show', compact('apprentice'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $apprentice = json_decode(json_encode(Http::get($url . '/apprentices/' . $id)->json()));

        if (!$apprentice || !isset($apprentice->id)) {
            return redirect()->route('admin.apprentices.index')->with('error', 'El aprendiz no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.apprentices.edit', array_merge($relations, compact('apprentice')));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'nullable|string|max:255',
            'document' => 'nullable|string|max:255',
            'estrato' => 'nullable|integer|min:1|max:6',
            'address' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'cell_number' => 'required|string|max:255',
            'course_id' => 'required',
            'computer_id' => 'nullable',
        ]);

        $response = Http::put($url . '/apprentices/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.apprentices.index')->with('success', 'Aprendiz actualizado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/apprentices/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.apprentices.index')->with('success', 'Aprendiz eliminado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
