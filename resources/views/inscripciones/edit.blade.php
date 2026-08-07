<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar inscripción</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-6">
    <div class="max-w-3xl mx-auto bg-white rounded-xl shadow p-8">
        <h1 class="text-2xl font-bold mb-6">Editar inscripción</h1>

        <form method="POST" action="{{ route('inscripciones.update', $inscripcion) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium">Representante</label>
                    <select name="representante_id" class="w-full border rounded-lg p-2" required>
                        @foreach ($representantes as $representante)
                            <option value="{{ $representante->id }}" {{ $representante->id == old('representante_id', $inscripcion->representante_id) ? 'selected' : '' }}>
                                {{ $representante->nombre }} {{ $representante->apellido }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $inscripcion->nombre) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido', $inscripcion->apellido) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Cédula</label>
                    <input type="text" name="cedula" value="{{ old('cedula', $inscripcion->cedula) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Grado</label>
                    <input type="text" name="grado" value="{{ old('grado', $inscripcion->grado) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Curso</label>
                    <input type="text" name="curso" value="{{ old('curso', $inscripcion->curso) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Fecha de inscripción</label>
                    <input type="date" name="fecha_inscripcion" value="{{ old('fecha_inscripcion', $inscripcion->fecha_inscripcion) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Estado</label>
                    <select name="estado" class="w-full border rounded-lg p-2" required>
                        <option value="activa" {{ $inscripcion->estado == 'activa' ? 'selected' : '' }}>Activa</option>
                        <option value="pendiente" {{ $inscripcion->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                        <option value="finalizada" {{ $inscripcion->estado == 'finalizada' ? 'selected' : '' }}>Finalizada</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium">Observaciones</label>
                    <textarea name="observaciones" class="w-full border rounded-lg p-2">{{ old('observaciones', $inscripcion->observaciones) }}</textarea>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('inscripciones.index') }}" class="bg-slate-200 px-4 py-2 rounded-lg">Cancelar</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
