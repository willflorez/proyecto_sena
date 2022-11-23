@extends('dashboard')

@section('content')
<h1> Editar Proveedor </h1>

<br>

<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
    <form action="{{ route('post_proveedores') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id_proveedores" name="id_proveedores" value="{{ $proveedores->id_proveedores }}"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_proveedores" name="nombre_proveedores" value="{{ $proveedores->nombre_proveedores }}" required> 
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_proveedores" name="apellido_proveedores" value="{{ $proveedores->apellido_proveedores }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numero Documento</label>
                <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="{{ $proveedores->numero_documento }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono</label>
                <input type="number" class="form-control" id="telefono_proveedores" name="telefono_proveedores" value="{{ $proveedores->telefono_proveedores }}" required>
            </div>            
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <div class="col-md-3"> </div>
</div>

@endsection