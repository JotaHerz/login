@extends('structure')

@section('title','Usuarios')


@section('content')

<div class="container">
    <div class=" justify-content-center text-center">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Email Verificado</th>
                    <th>Habilitacion de Usuario</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                 <th >{{ $user->id }}</th>
                 <th>{{ $user->name }}</th>
                 <th>{{ $user->email }}</th>
                 @if($user->email_verified_at)
                 <td>Verificado</td>
                 @else
                 <td >Pendiente</td>
                    @endif

                 @if($user->enabled_user)
                 <td >Habilitado</td>
                @else
                <td>Inhabilitado</td>
                   @endif

                 <th>


                     <a class="btn btn-info btn-xs" href="{{ route('edit.usuarios',$user) }}"><svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-pencil-square" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                         <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456l-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                         <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                       </svg> Modificar</a>



                 </th>

             </tr>

                @endforeach

            </tbody>
        </table>

      </div>

</div>


@endsection
