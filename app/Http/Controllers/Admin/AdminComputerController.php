<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class AdminComputerController extends BaseAdminController
{
    protected function redirectRoute(): string
    {
        return 'admin.computers.index';
    }

    public function index()
    {
        $computers = $this->list('/computers');

        return view('admin.computers.index', compact('computers'));
    }

    public function create()
    {
        return view('admin.computers.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        return $this->persist($request, 'post', '/computers', $data, 'image', 'Computador creado correctamente.');
    }

    public function edit($id)
    {
        $computer = $this->item('/computers/' . $id);

        if (!$computer) {
            return redirect()->route('admin.computers.index')->with('error', 'El computador no fue encontrado.');
        }

        return view('admin.computers.edit', compact('computer'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'brand' => 'required|string|max:255',
            'number' => 'required|string|max:255',
        ]);

        return $this->persist($request, 'put', '/computers/' . $id, $data, 'image', 'Computador actualizado correctamente.');
    }

    public function destroy($id)
    {
        return $this->destroyRecord('/computers/' . $id, 'Computador eliminado correctamente.');
    }
}
