<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminApprenticeController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.apprentices.index';
    }

    private function relations()
    {
        return [
            'courses' => $this->list('/courses'),
            'computers' => $this->list('/computers'),
        ];
    }

    public function index()
    {
        $apprentices = $this->list('/apprenticees?included=course,computer');

        return view('admin.apprentices.index', compact('apprentices'));
    }

    public function create()
    {
        $relations = $this->relations();

        return view('admin.apprentices.create', $relations);
    }

    public function store(Request $request)
    {
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

        return $this->persist($request, 'post', '/apprenticees', $data, 'image', 'Aprendiz creado correctamente.');
    }

    public function edit($id)
    {
        $apprentice = $this->item('/apprenticees/' . $id);

        if (!$apprentice) {
            return redirect()->route('admin.apprentices.index')->with('error', 'El aprendiz no fue encontrado.');
        }

        $relations = $this->relations();

        return view('admin.apprentices.edit', array_merge($relations, compact('apprentice')));
    }

    public function update(Request $request, $id)
    {
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

        return $this->persist($request, 'put', '/apprenticees/' . $id, $data, 'image', 'Aprendiz actualizado correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/apprenticees/' . $id, 'Aprendiz eliminado correctamente.');
    }
}
