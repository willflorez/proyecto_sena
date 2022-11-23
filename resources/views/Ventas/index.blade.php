@extends('dashboard')

@section('content')


<br>

<a href="{{  route('create_ventas') }}" type="button" class="btn btn-primary">Crear Venta </a>
<br>
<br>

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Cliente </th>
        <th scope="col">Producto</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Precio</th>    
        <th scope="col">Fecha de compra</th>
        <th scope="col">Fecha de creacion</th>
        <th scope="col">Fecha de Actualización</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($ventas as $key => $i )
            
            <tr>
                    <th scope="row">1</th>
                    <td>{{$i->nombre_cliente}}  {{$i->apellido_cliente}} </td>
                    <td>{{$i->producto}}</td>
                    <td>{{$i->cantidad_c}}</td>
                    <td>{{$i->precio_v}}</td>                    
                    <td>{{$i->fecha_compra}}</td>
                    <td>{{$i->fecha_creacion}}</td>
                    <td>{{$i->fecha_actualizacion}}</td>                    
                    <td><a href="{{ route('delete_ventas' , ['id_ventas' => $i->id_ventas ]) }}" type="button" class="btn btn-danger">Eliminar</button></td>
                  </tr>   
        @endforeach
         
    </tbody>
  </table>



@endsection