<?php

namespace App\Http\Controllers;

use App\Models\Representante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RepresentanteController extends Controller
{
    public function index(): View
    {
        $representantes = Representante::latest()->get();

        return view('representantes.index', compact('representantes'));
    }

    public function create(): View
    {
        return view('representantes.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:representantes,cedula'],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:representantes,email'],
            'direccion' => ['required', 'string', 'max:255'],
        ]);

        Representante::create($data);

        return redirect()->route('representantes.index')->with('success', 'Representante registrado correctamente.');
    }

    public function edit(Representante $representante): View
    {
        return view('representantes.edit', compact('representante'));
    }

    public function update(Request $request, Representante $representante): RedirectResponse
    {
        $data = $request->validate([
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:representantes,cedula,' . $representante->id],
            'telefono' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:representantes,email,' . $representante->id],
            'direccion' => ['required', 'string', 'max:255'],
        ]);

        $representante->update($data);

        return redirect()->route('representantes.index')->with('success', 'Representante actualizado correctamente.');
    }

    public function destroy(Representante $representante): RedirectResponse
    {
        $representante->delete();

        return redirect()->route('representantes.index')->with('success', 'Representante eliminado correctamente.');
    }
}
