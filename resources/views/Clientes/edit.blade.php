@extends('dashboard')

@section('content')
<h1> Editar Cliente </h1>

<br>

<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
    <form action="{{ route('post_clientes') }}" method="POST"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" class="form-control" id="id_cliente" name="id_cliente" value="{{ $cliente->id_cliente }}"> 
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre_cliente" name="nombre_cliente" value="{{ $cliente->nombre_cliente }}" required> 
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="apellido_cliente" name="apellido_cliente" value="{{ $cliente->apellido_cliente }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Numero Documento</label>
                <input type="text" class="form-control" id="numero_documento" name="numero_documento" value="{{ $cliente->numero_documento }}" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Telefono</label>
                <input type="text" class="form-control" id="telefono_cliente" name="telefono_cliente" value="{{ $cliente->telefono_cliente }}" required>
            </div>            
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <div class="col-md-3"> </div>
</div>

@endsection