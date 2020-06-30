<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=na, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js') }}" defer></script>
    <style>

    </style>


</head>
<body>
    <div class="d-flex flex-column h-screen justify-content-between">
        <header>
            @include('partials.nav')
    </header>

    <main>
        @yield('content')
    </main>
    <footer class="bg-white text-center text-black-50 py shadow">
        {{ config('app.name') }} | copyright @ {{ date('Y') }}
    </footer>
</div>


</body>
</html>
