@extends('dashboard')
@section('content')
<br>

<a href="{{  route('create_clientes') }}" type="button" class="btn btn-primary">Crear Clientes </a>
<br>
<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre </th>
        <th scope="col">Apellido</th>
        <th scope="col">Numero Documento</th>
        <th scope="col">Telefono Cliente</th>    
        <th scope="col">Fecha de creacion</th>
        <th scope="col">Fecha de Actualización</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($clientes as $key => $i )
            
            <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$i->nombre_cliente}}</td>
                    <td>{{$i->apellido_cliente}}</td>
                    <td>{{$i->numero_documento}}</td>
                    <td>{{$i->telefono_cliente}}</td>                    
                    <td>{{$i->fecha_creacion}}</td>
                    <td>{{$i->fecha_actualizacion}}</td>
                    <td><a href="{{ route('edit_clientes' , ['id_cliente' => $i->id_cliente ]) }}" type="button" class="btn btn-secondary">Editar</button></td>
                    <td><a href="{{ route('delete_clientes' , ['id_cliente' => $i->id_cliente ]) }}" type="button" class="btn btn-danger">Eliminar</button></td>
                  </tr>   
        @endforeach
         
    </tbody>
  </table>
  @endsection

