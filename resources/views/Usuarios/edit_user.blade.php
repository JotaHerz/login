@extends('structure')

@section('title','Usuarios')


@section('content')

  <div class="container">
  <form method="POST" action="{{route('update.usuarios',$usuario)}}">
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label for="exampleInputEmail1">Name</label>
      <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
        value="{{$usuario->name}}">
    </div>
    <div class="form-group form-check">
      <input name="enabled_user" type="checkbox" class="form-check-input" id="exampleCheck1" @if ($usuario->enabled_user)
      checked @endif>
      <label class="form-check-label" for="exampleCheck1">Habilitado</label>
    </div>
    <button type="submit" class="btn btn-success">Submit</button>
    <a class="btn btn-danger" href="{{ URL::previous() }}">Volver</a>
  </form>
</div>
@endsection
