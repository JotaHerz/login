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
    @include('partials.nav')
    @include('partials.session-status')

    @if(session()->has('info'))
    <div class="container">
     <div class="alert alert-info">{{ session('info') }}</div>
    </div>
    @endif

    @yield('content')

</body>
</html>
