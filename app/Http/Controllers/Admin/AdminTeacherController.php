<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminTeacherController extends Controller
{
    private function relations()
    {
        $url = env('URL_SERVER_API');

        return [
            'areas' => json_decode(json_encode(Http::get($url . '/areas')->json())) ?? [],
            'trainingCenters' => json_decode(json_encode(Http::get($url . '/training-centers')->json())) ?? [],
            'courses' => json_decode(json_encode(Http::get($url . '/courses')->json())) ?? [],
        ];
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $teachers = json_decode(json_encode(Http::get($url . '/teachers?included=area,trainingCenter,courses')->json())) ?? [];

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create(){

        $relations = $this->relations();

        return view('admin.teachers.create', $relations);
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'courses' => 'nullable|array',
        ]);

        $response = Http::post($url . '/teachers', $data);

        if ($response->successful()) {
            return redirect()->route('admin.teachers.index')->with('success', 'Instructor creado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $teacher = json_decode(json_encode(Http::get($url . '/teachers/' . $id . '?included=area,trainingCenter,courses')->json()));

        if (!$teacher || !isset($teacher->id)) {
            return redirect()->route('admin.teachers.index')->with('error', 'El instructor no fue encontrado.');
        }

        return view('admin.teachers.show', compact('teacher'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $teacher = json_decode(json_encode(Http::get($url . '/teachers/' . $id . '?included=courses')->json()));

        if (!$teacher || !isset($teacher->id)) {
            return redirect()->route('admin.teachers.index')->with('error', 'El instructor no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.teachers.edit', array_merge($relations, compact('teacher')));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'courses' => 'nullable|array',
        ]);

        $response = Http::put($url . '/teachers/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.teachers.index')->with('success', 'Instructor actualizado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/teachers/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.teachers.index')->with('success', 'Instructor eliminado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
