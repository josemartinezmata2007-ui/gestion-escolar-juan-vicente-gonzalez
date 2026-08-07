@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Asignar Nota</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('grades.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Seleccionar Estudiante</label>
                        <select name="student_id" class="form-select" required>
                            <option value="">Seleccione...</option>
                            @foreach($students as $student)
                                <option value="{{ $student->id }}">{{ $student->cedula }} - {{ $student->nombre }} {{ $student->apellido }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Materia</label>
                        <input type="text" name="materia" class="form-control" placeholder="Ej: Matemáticas" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nota (0 al 20)</label>
                        <input type="number" step="0.01" min="0" max="20" name="nota" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Guardar Nota</button>
                    <a href="{{ route('grades.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection