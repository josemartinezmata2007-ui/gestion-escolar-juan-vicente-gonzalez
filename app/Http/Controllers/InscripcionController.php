<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Representante;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InscripcionController extends Controller
{
    public function index(): View
    {
        $inscripciones = Inscripcion::with('representante')->latest()->get();

        return view('inscripciones.index', compact('inscripciones'));
    }

    public function create(): View
    {
        $representantes = Representante::all();

        return view('inscripciones.create', compact('representantes'));
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'representante_id' => ['required', 'exists:representantes,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:inscripciones,cedula'],
            'grado' => ['required', 'string', 'max:50'],
            'curso' => ['required', 'string', 'max:100'],
            'fecha_inscripcion' => ['required', 'date'],
            'estado' => ['required', 'in:activa,pendiente,finalizada'],
            'observaciones' => ['nullable', 'string'],
        ]);

        Inscripcion::create($data);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción registrada correctamente.');
    }

    public function edit(Inscripcion $inscripcion): View
    {
        $representantes = Representante::all();

        return view('inscripciones.edit', compact('inscripcion', 'representantes'));
    }

    public function update(Request $request, Inscripcion $inscripcion): RedirectResponse
    {
        $data = $request->validate([
            'representante_id' => ['required', 'exists:representantes,id'],
            'nombre' => ['required', 'string', 'max:255'],
            'apellido' => ['required', 'string', 'max:255'],
            'cedula' => ['required', 'string', 'max:20', 'unique:inscripciones,cedula,' . $inscripcion->id],
            'grado' => ['required', 'string', 'max:50'],
            'curso' => ['required', 'string', 'max:100'],
            'fecha_inscripcion' => ['required', 'date'],
            'estado' => ['required', 'in:activa,pendiente,finalizada'],
            'observaciones' => ['nullable', 'string'],
        ]);

        $inscripcion->update($data);

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción actualizada correctamente.');
    }

    public function destroy(Inscripcion $inscripcion): RedirectResponse
    {
        $inscripcion->delete();

        return redirect()->route('inscripciones.index')->with('success', 'Inscripción eliminada correctamente.');
    }
}
