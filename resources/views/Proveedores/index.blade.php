@extends('dashboard')
@section('content')
<br>

<a href="{{  route('create_proveedores') }}" type="button" class="btn btn-primary">Crear Proveedores </a>
<br>
<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre </th>
        <th scope="col">Apellido</th>
        <th scope="col">Numero Documento</th>
        <th scope="col">Telefono Proveedor</th>    
        <th scope="col">Fecha de creacion</th>
        <th scope="col">Fecha de Actualización</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>  
          @foreach ($proveedores as $key => $i )            
            <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$i->nombre_proveedores}}</td>
                    <td>{{$i->apellido_proveedores}}</td>
                    <td>{{$i->numero_documento}}</td>
                    <td>{{$i->telefono_proveedores}}</td>                    
                    <td>{{$i->fecha_creacion}}</td>
                    <td>{{$i->fecha_actualizacion}}</td>
                    <td><a href="{{ route('edit_proveedores' , ['id_proveedores' => $i->id_proveedores ]) }}" type="button" class="btn btn-secondary">Editar</button></td>
                    <td><a href="{{ route('delete_proveedores' , ['id_proveedores' => $i->id_proveedores ]) }}" type="button" class="btn btn-danger">Eliminar</button></td>
                  </tr>   
        @endforeach
         
    </tbody>
  </table>
  @endsection



