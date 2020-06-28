@extends('structure')

@section('title','Productos')


@section('content')

<h1>Productos</h1>
<ul>
    @foreach($products as $Item)
    <li>{{ $Item->title}}<br> <small>{{ $Item->description }}</small></li>

    @endforeach
</ul>

@endsection
