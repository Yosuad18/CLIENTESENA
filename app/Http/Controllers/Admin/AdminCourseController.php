<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminCourseController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.courses.index';
    }

    private function relations()
    {
        return [
            'areas' => $this->list('/areas'),
            'trainingCenters' => $this->list('/training-centers'),
            'teachers' => $this->list('/teachers'),
        ];
    }

    public function index()
    {
        $courses = $this->list('/courses?included=area,trainingCenter,teachers');

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        $relations = $this->relations();

        return view('admin.courses.create', $relations);
    }

    public function store(Request $request)
    {
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

        return $this->persist($request, 'post', '/courses', $data, 'image', 'Curso creado correctamente.');
    }

    public function edit($id)
    {
        $course = $this->item('/courses/' . $id . '?included=teachers');

        if (!$course) {
            return redirect()->route('admin.courses.index')->with('error', 'El curso no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.courses.edit', array_merge($relations, compact('course')));
    }

    public function update(Request $request, $id)
    {
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

        return $this->persist($request, 'put', '/courses/' . $id, $data, 'image', 'Curso actualizado correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/courses/' . $id, 'Curso eliminado correctamente.');
    }
}
