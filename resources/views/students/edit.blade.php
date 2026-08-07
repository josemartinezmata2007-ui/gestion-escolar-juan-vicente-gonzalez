@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow-sm">
            <div class="card-header bg-warning">
                <h4 class="mb-0">Editar Estudiante</h4>
            </div>
            <div class="card-body">
                <form action="{{ route('students.update', $student) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label class="form-label">Cédula</label>
                        <input type="text" name="cedula" class="form-control" value="{{ $student->cedula }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $student->nombre }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" name="apellido" class="form-control" value="{{ $student->apellido }}" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Sección</label>
                        <input type="text" name="seccion" class="form-control" value="{{ $student->seccion }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                    <a href="{{ route('students.index') }}" class="btn btn-secondary w-100 mt-2">Cancelar</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection