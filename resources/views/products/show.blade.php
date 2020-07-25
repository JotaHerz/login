@extends('structure')

@section('title', 'Productos | '.$products->title)


@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-8 mx-auto">
            @if($products->image)
                    <img class="card-img-top"
                    src="/storage/{{ $products->image }}"
                    alt="{{$products->title}}">
            @endif
            <div class="bg-white p-5 shadow rounded">
                <h1>{{ $products->title}}</h1>
                <p class="text-secondary">
                    {{ $products->description}}
                </p>

                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('products.index') }}">
                        Regresar
                    </a>

                        <div class="btn-group btn-group-sm">

                        <a class="btn btn-success"

                        href="{{ route('products.edit', $products) }}">Editar Producto</a>

                        <a class="btn btn-danger"

                        href="#" onclick="document.getElementById('products-destroy').
                        submit()">Eliminar</a>
                </div>
                <form id="products-destroy"
                    class="d-none"
                     method="POST" action="{{ route('products.destroy', $products) }}">
                    @csrf @method('DELETE')

                 </form>
            </div>

        </div>

    </div>

</div>


@endsection
