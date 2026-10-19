<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminTeacherController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.teachers.index';
    }

    private function relations()
    {
        return [
            'areas' => $this->list('/areas'),
            'trainingCenters' => $this->list('/training-centers'),
            'courses' => $this->list('/courses'),
        ];
    }

    public function index()
    {
        $teachers = $this->list('/teachers?included=area,trainingCenter,courses');

        return view('admin.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $relations = $this->relations();

        return view('admin.teachers.create', $relations);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'courses' => 'nullable|array',
        ]);

        return $this->persist($request, 'post', '/teachers', $data, 'image', 'Instructor creado correctamente.');
    }

    public function edit($id)
    {
        $teacher = $this->item('/teachers/' . $id . '?included=courses');

        if (!$teacher) {
            return redirect()->route('admin.teachers.index')->with('error', 'El instructor no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.teachers.edit', array_merge($relations, compact('teacher')));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'area_id' => 'required',
            'training_center_id' => 'required',
            'courses' => 'nullable|array',
        ]);

        return $this->persist($request, 'put', '/teachers/' . $id, $data, 'image', 'Instructor actualizado correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/teachers/' . $id, 'Instructor eliminado correctamente.');
    }
}
