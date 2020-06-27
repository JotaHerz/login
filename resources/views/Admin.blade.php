@extends('structure')

@section('title','Usuarios')


@section('content')

<div class="panel panel-default">
    <div class="panel-body">

       <table class="table table-hover">
           <thead>
               <tr>
                   <th>Id</th>
                   <th>Nombre</th>
                   <th>Email</th>
                   <th>Acciones</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($users as $user)
               <tr>
                <th>{{ $user->id }}</th>
                <th>{{ $user->name }}</th>
                <th>{{ $user->email }}</th>
                <th>
                    <button class="btn btn-info btn-xs">Personificar</button>
                </th>

            </tr>

               @endforeach

           </tbody>
       </table>

    </div>
</div>




@endsection
