@extends('dashboard')

@section('content')

<h1> Crear inventario </h1>
<br>
<div class="row">
    <div class="col-md-3"> </div>
    <div class="col-md-6">
    <form action="{{ route('post_create_inventario') }}" method="POST"  enctype="multipart/form-data">
            @csrf        
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Producto</label>
                <input type="text" class="form-control" id="producto" name="producto" required> 
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Fecha Compra</label>
                <input type="date" class="form-control" id="fecha_compra" name="fecha_compra" required>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" required>
            </div>          
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
        </form>
    </div>
    <div class="col-md-3"> </div>
</div>

@endsection