@extends('structure')

@section('title','Inicio')


@section('content')

<h1>Inicio</h1>
@auth
    {{ auth()->user()->name }}

@endauth

@endsection
