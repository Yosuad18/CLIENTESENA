<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminTrainingCenterController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.training-centers.index';
    }

    public function index()
    {
        $trainingCenters = $this->list('/training-centers');

        return view('admin.training_centers.index', compact('trainingCenters'));
    }

    public function create()
    {
        return view('admin.training_centers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        return $this->persist($request, 'post', '/training-centers', $data, 'image', 'Centro de formación creado correctamente.');
    }

    public function edit($id)
    {
        $trainingCenter = $this->item('/training-centers/' . $id);

        if (!$trainingCenter) {
            return redirect()->route('admin.training-centers.index')->with('error', 'El centro de formación no fue encontrado.');
        }

        return view('admin.training_centers.edit', compact('trainingCenter'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:255',
        ]);

        return $this->persist($request, 'put', '/training-centers/' . $id, $data, 'image', 'Centro de formación actualizado correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/training-centers/' . $id, 'Centro de formación eliminado correctamente.');
    }
}
