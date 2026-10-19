<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AdminCourseController extends Controller
{
    private function relations()
    {
        $url = env('URL_SERVER_API');

        return [
            'areas' => json_decode(json_encode(Http::get($url . '/areas')->json())) ?? [],
            'trainingCenters' => json_decode(json_encode(Http::get($url . '/training-centers')->json())) ?? [],
            'teachers' => json_decode(json_encode(Http::get($url . '/teachers')->json())) ?? [],
        ];
    }

    public function index(){ //http://api.codersfree.test/v1/categories?included=posts

        $url = env('URL_SERVER_API');

        $courses = json_decode(json_encode(Http::get($url . '/courses?included=area,trainingCenter,teachers')->json())) ?? [];

        return view('admin.courses.index', compact('courses'));
    }

    public function create(){

        $relations = $this->relations();

        return view('admin.courses.create', $relations);
    }

    public function store(Request $request){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'course_number' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'day' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'teachers' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
        ]);

        $file = $request->file('image');

        $response = $file
            ? Http::attach('image', file_get_contents($file->getRealPath()), $file->getClientOriginalName())->post($url . '/courses', $data)
            : Http::post($url . '/courses', $data);

        if ($response->successful()) {
            return redirect()->route('admin.courses.index')->with('success', 'Curso creado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function show($id){

        $url = env('URL_SERVER_API');

        $course = json_decode(json_encode(Http::get($url . '/courses/' . $id . '?included=area,trainingCenter,teachers')->json()));

        if (!$course || !isset($course->id)) {
            return redirect()->route('admin.courses.index')->with('error', 'El curso no fue encontrado.');
        }

        return view('admin.courses.show', compact('course'));
    }

    public function edit($id){

        $url = env('URL_SERVER_API');

        $course = json_decode(json_encode(Http::get($url . '/courses/' . $id . '?included=teachers')->json()));

        if (!$course || !isset($course->id)) {
            return redirect()->route('admin.courses.index')->with('error', 'El curso no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.courses.edit', array_merge($relations, compact('course')));
    }

    public function update(Request $request, $id){

        $url = env('URL_SERVER_API');

        $data = $request->validate([
            'course_number' => 'required|string|max:255',
            'name' => 'nullable|string|max:255',
            'day' => 'required|string|max:255',
            'deadline' => 'nullable|date',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'teachers' => 'nullable|array',
            'image' => 'nullable|image|max:2048',
        ]);

        $file = $request->file('image');

        $response = $file
            ? Http::attach('image', file_get_contents($file->getRealPath()), $file->getClientOriginalName())->put($url . '/courses/' . $id, $data)
            : Http::put($url . '/courses/' . $id, $data);

        if ($response->successful()) {
            return redirect()->route('admin.courses.index')->with('success', 'Curso actualizado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo guardar el registro.')->withInput();
    }

    public function destroy($id){

        $url = env('URL_SERVER_API');

        $response = Http::delete($url . '/courses/' . $id);

        if ($response->successful()) {
            return redirect()->route('admin.courses.index')->with('success', 'Curso eliminado correctamente.');
        }

        return back()->with('error', $response->json('message') ?? 'No se pudo eliminar el registro.');
    }
}
