@extends('layouts.sistema')

@section('content')
    
        <h1 class="h2">Administracion de Condominios</h1>
    
        <h2>Usuarios de Sistema</h2>

        <table class="table table-hover table-responsive-lg">
        <thead class="thead-dark">
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Email</th>
        <th scope="col">Roles</th>
        </tr>
        </thead> 
        <tbody>
        
            @foreach($users as $k => $usuario)
                
                <tr>
                <th scope="row">{{$k+1}}</th>
                <td>{{$usuario->name }}</td>
                <td>{{$usuario->email }}</td>
                <td>
                @if ($usuario->roles <> null)
                    @foreach($usuario->roles as $k1 => $role)
                        <div class="d-flex flex-column">
                        <span>{{$role->name}}</span>
                        <span>{{$role->description}}</span>
                        </div>
                    @endforeach
                @endif

                </td>
                </tr>
            @endforeach

        </tbody>
        </table>
   
      
@endsection