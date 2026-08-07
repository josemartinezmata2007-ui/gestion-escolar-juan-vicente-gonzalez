@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Registro de Calificaciones</h2>
    <a href="{{ route('grades.create') }}" class="btn btn-primary"> + Asignar Nota</a>
</div>

<div class="card shadow-sm">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-dark">
                <tr>
                    <th>Estudiante</th>
                    <th>Materia</th>
                    <th>Nota</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($grades as $grade)
                <tr>
                    <td>{{ $grade->student->nombre }} {{ $grade->student->apellido }}</td>
                    <td>{{ $grade->materia }}</td>
                    <td><span class="badge bg-info text-dark fs-6">{{ $grade->nota }}</span></td>
                    <td>
                        <form action="{{ route('grades.destroy', $grade) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar nota?')">Borrar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">No hay notas registradas.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection