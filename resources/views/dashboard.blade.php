<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 min-h-screen">
    <nav class="bg-slate-900 text-white px-6 py-4 flex justify-between items-center">
        <div>
            <h1 class="text-xl font-bold">Sistema de Inscripciones</h1>
        </div>
        <div class="flex items-center gap-4">
            <a href="{{ route('representantes.index') }}" class="hover:text-slate-300">Representantes</a>
            <a href="{{ route('inscripciones.index') }}" class="hover:text-slate-300">Inscripciones</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-red-500 px-3 py-2 rounded-lg hover:bg-red-600">Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto px-4 py-10">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10">
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-slate-500">Representantes</p>
                <h2 class="text-3xl font-bold mt-2">{{ $totalRepresentantes }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-slate-500">Inscripciones</p>
                <h2 class="text-3xl font-bold mt-2">{{ $totalInscripciones }}</h2>
            </div>
            <div class="bg-white p-6 rounded-xl shadow">
                <p class="text-sm text-slate-500">Activas</p>
                <h2 class="text-3xl font-bold mt-2">{{ $inscripcionesActivas }}</h2>
            </div>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow">
            <h2 class="text-2xl font-bold mb-4">Bienvenido</h2>
            <p class="text-slate-600">Desde aquí puedes gestionar representantes e inscripciones del sistema.</p>
        </div>
    </main>
</body>
</html>
