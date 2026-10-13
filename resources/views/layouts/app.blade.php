<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Praktikum Laravel')</title>
</head>
<body>
    <nav>
        <a href="{{ route('mahasiswa.profil') }}">Profil</a> |
        <a href="{{ route('mahasiswa.daftar') }}">Daftar Mahasiswa</a>
    </nav>

    <hr>

    <main>
        @yield('content')
    </main>
</body>
</html>
