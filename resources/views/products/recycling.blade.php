@extends('structure')

@section('title', 'Papelera')


@section('content')

<div class="container">
    <div "d-flex flex-wrap justify-content-between align-items-start">
        @foreach($deletedProducts as $deletedProduct )
        <div class="card border-0 shadow-sm mt-4 mx-auto" style="width: 18rem">
            @if($deletedProduct->image)
                    <img class="card-img-top" style="height: 150px; object-fit:cover"
                    src="/storage/{{$deletedProduct->image }}"
                    alt="{{$deletedProduct->title}}">
            @endif
                <div class="card-body">
                    <h5 class="card-title">{{$deletedProduct->title}}</h5>
                    <p class="card-text text-truncate">{{ $deletedProduct->cost }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <p class="card-text text-truncate">{{ $deletedProduct->description }}</p>
                    </div>
                    <div>
                        <form class="d-inline" method="POST" action="{{ route('products.restore',$deletedProduct) }}">
                            @csrf @method('PATCH')
                            @can('restore', $deletedProduct)
                            <button class="btn btn-sm btn-info">Habilitar</button>
                            @endcan
                        </form>
                        <form class="d-inline" method="POST" action="{{ route('products.forceDelete',$deletedProduct) }}">
                            @csrf @method('DELETE')
                            @can('forceDelete', $deletedProduct)
                            <button class="btn btn-sm btn-danger">Eliminar</button>
                            @endcan


                        </form>


                    </div>





                </div>
        </div>

        @endforeach

    </div>

</div>

@endsection
