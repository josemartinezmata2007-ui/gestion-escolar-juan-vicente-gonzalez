<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Representantes</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">
    <nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center">
        <div class="font-bold">Sistema</div>
        <div class="flex gap-4 items-center">
            <a href="{{ route('dashboard') }}" class="hover:text-slate-300">Dashboard</a>
            <a href="{{ route('inscripciones.index') }}" class="hover:text-slate-300">Inscripciones</a>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Representantes</h1>
            <a href="{{ route('representantes.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Nuevo representante</a>
        </div>

        @if(session('success'))
            <div class="bg-green-100 text-green-700 border border-green-200 rounded-lg p-3 mb-4">{{ session('success') }}</div>
        @endif

        <div class="bg-white rounded-xl shadow overflow-hidden">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-4 py-3 text-left">Nombre</th>
                        <th class="px-4 py-3 text-left">Cédula</th>
                        <th class="px-4 py-3 text-left">Teléfono</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @foreach ($representantes as $representante)
                        <tr>
                            <td class="px-4 py-3">{{ $representante->nombre }} {{ $representante->apellido }}</td>
                            <td class="px-4 py-3">{{ $representante->cedula }}</td>
                            <td class="px-4 py-3">{{ $representante->telefono }}</td>
                            <td class="px-4 py-3">{{ $representante->email }}</td>
                            <td class="px-4 py-3 flex gap-2">
                                <a href="{{ route('representantes.edit', $representante) }}" class="bg-yellow-500 text-white px-3 py-1 rounded">Editar</a>
                                <form action="{{ route('representantes.destroy', $representante) }}" method="POST" onsubmit="return confirm('¿Desea eliminar este representante?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
