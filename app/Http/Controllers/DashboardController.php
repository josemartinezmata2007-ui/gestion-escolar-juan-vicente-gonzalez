<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Representante;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard', [
            'totalRepresentantes' => Representante::count(),
            'totalInscripciones' => Inscripcion::count(),
            'inscripcionesActivas' => Inscripcion::where('estado', 'activa')->count(),
        ]);
    }
}
