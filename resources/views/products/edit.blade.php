@extends('structure')

@section('title','Crear productos')


@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">


        @include('partials.validation_errors')

        <form class="bg-white py-3 px-4 shadow rounded" method="POST" enctype="multipart/form-data" action="{{ route('products.update', $products)}}">
            <h1 class="display-8">Editar Producto</h1>
            <hr>
            @csrf @method('PATCH')
            @include('products._form', ['btnText'=>'Actualizar'])

        </form>

    </div>
</div>

@endsection
