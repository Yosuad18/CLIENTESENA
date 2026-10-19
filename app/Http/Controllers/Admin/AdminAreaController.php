<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminAreaController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.areas.index';
    }

    public function index()
    {
        $areas = $this->list('/areas');

        return view('admin.areas.index', compact('areas'));
    }

    public function create()
    {
        return view('admin.areas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return $this->persist($request, 'post', '/areas', $data, 'image', 'Área creada correctamente.');
    }

    public function edit($id)
    {
        $area = $this->item('/areas/' . $id);

        if (!$area) {
            return redirect()->route('admin.areas.index')->with('error', 'El área no fue encontrada.');
        }

        return view('admin.areas.edit', compact('area'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
        ]);

        return $this->persist($request, 'put', '/areas/' . $id, $data, 'image', 'Área actualizada correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/areas/' . $id, 'Área eliminada correctamente.');
    }
}
