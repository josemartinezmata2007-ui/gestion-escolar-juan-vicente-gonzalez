<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar representante</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen p-6">
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow p-8">
        <h1 class="text-2xl font-bold mb-6">Editar representante</h1>

        <form method="POST" action="{{ route('representantes.update', $representante) }}" class="space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block mb-1 font-medium">Nombre</label>
                    <input type="text" name="nombre" value="{{ old('nombre', $representante->nombre) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Apellido</label>
                    <input type="text" name="apellido" value="{{ old('apellido', $representante->apellido) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Cédula</label>
                    <input type="text" name="cedula" value="{{ old('cedula', $representante->cedula) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div>
                    <label class="block mb-1 font-medium">Teléfono</label>
                    <input type="text" name="telefono" value="{{ old('telefono', $representante->telefono) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email', $representante->email) }}" class="w-full border rounded-lg p-2" required>
                </div>
                <div class="md:col-span-2">
                    <label class="block mb-1 font-medium">Dirección</label>
                    <textarea name="direccion" class="w-full border rounded-lg p-2" required>{{ old('direccion', $representante->direccion) }}</textarea>
                </div>
            </div>

            <div class="flex justify-between">
                <a href="{{ route('representantes.index') }}" class="bg-slate-200 px-4 py-2 rounded-lg">Cancelar</a>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg">Actualizar</button>
            </div>
        </form>
    </div>
</body>
</html>
