@extends('structure')

@section('title','Contactanos')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 col-sm-10 col-lg-6 mx-auto">

            <form class="bg-white shadow rounded py-3 px-4" method="POST" action="{{ route('contact') }}">

                @csrf
                <h1 class="display-8">Contáctanos</h1>
                <hr>
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input class="form-control bg-light shadow-sm @error('name') is-invalid @else border-0 @enderror"
                    id="name"
                    name="name"
                    placeholder="Nombre..."
                    value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                    id="email"
                    type="text"
                    name="email"
                    placeholder="Email..."
                    value="{{ old('email') }}">
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <label for="subject">Asunto</label>
                    <input class="form-control bg-light shadow-sm @error('subject') is-invalid @else border-0 @enderror"
                    id="subject"
                    name="subject"
                    placeholder="Asunto..."
                    value="{{ old('subject') }}">
                    @error('subject')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <textarea class="form-control bg-light shadow-sm @error('email') is-invalid @else border-0 @enderror"
                    name="content"
                    placeholder="Mensaje..."
                    value="{{ old('content') }}"></textarea>
                    @error('content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <button class="btn btn-primary btn-lg btn-block">Enviar</button><br>
            </form>
        </div>
    </div>

</div>
@endsection
