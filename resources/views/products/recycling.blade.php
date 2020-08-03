@extends('structure')

@section('title', 'Papelera')


@section('content')

    <div class="container">
        <div "d-flex flex-wrap justify-content-between align-items-start">
            @forelse($deletedProducts as $deletedProduct )
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


        @empty
        <div class="container">
            <div class="row">

                <div class="col-12 col-lg-6">
                    <h1 class="display-4 text-primary"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                    </svg>Productos inhabilitados</h1>
                    <p class="lead text-secondary">Lorem ipsum dolor sit amet consectetur adipisicing elit. Corporis eligendi
                    officia modi blanditiis amet earum illum culpa ad commodi adipisci vitae natus
                    necessitatibus perspiciatis pariatur molestias, beatae consectetur minus quo.</p>
                </div>
                <div class="col-12 col-lg-6">
                    <img class="img-fluid mb-4" src="/img/productos.svg" alt="">

                </div>

            </div>

        </div>

            @endforelse
        </div>
   </div>
@endsection
