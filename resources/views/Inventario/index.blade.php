@extends('dashboard')

@section('content')


<div class="row">
    <div class="col-md-12">
<a href="{{  route('create_inventario') }}" type="button" class="btn btn-primary">Crear inventario </a>
<br>
</div>

<div class="col-md-12">
    <br>
<table id="table_inventario" class="table table-striped table-bordered table-sm"  cellspacing="0" width="100%">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Producto</th>
        <th scope="col">Fecha de compra</th>
        <th scope="col">Cantidad</th>
        <th scope="col">Disponible</th>
        <th scope="col">Precio</th>
        <th scope="col">Fecha de creacion</th>
        <th scope="col">Fecha de Actualización</th>
        <th scope="col">Acciones</th>
      </tr>
    </thead>
    <tbody>
            @foreach ($inventario as $key => $i )
            
            <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{$i->producto}}</td>
                    <td>{{$i->fecha_compra}}</td>
                    <td>{{$i->cantidad}}</td>
                    <td>{{$i->disponible}}</td>
                    <td>${{$i->precio}}</td>
                    <td>{{$i->fecha_creacion}}</td>
                    <td>{{$i->fecha_modificacion}}</td>
                    <td><a href="{{ route('edit_inventario' , ['id_inventario' => $i->id_inventario ]) }}" type="button" class="btn btn-secondary">Editar</button></td>
                    <td><a href="{{ route('delete_inventario' , ['id_inventario' => $i->id_inventario ]) }}" type="button" class="btn btn-danger">Eliminar</button></td>

                  </tr>   
        @endforeach
         
    </tbody>
  </table>
</div>
<div>

  @endsection
  @section('page-js')
<script>
   $(document).ready(function() {
        $('#table_inventario').DataTable({})
   });
  <script>
  @endsection

