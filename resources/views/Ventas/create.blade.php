@extends('dashboard')

@section('content')
    <br>
    <div>
        <h1> Crear Venta </h1>
    </div>
    <br>

    <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
            <form action="{{ route('post_create_ventas') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" class="form-control" id="id_cliente" name="id_cliente">
                <div class="mb-3">
                    <label class="form-label">Cliente</label>
                    <select id="cliente" name="cliente" class="form-select" aria-label="Default select example" required>
                            <option value="" selected>Seleccionar CLiente</option>
                        @foreach ($cliente as $c)
                            <option value="{{ $c->id_cliente }}"> {{ $c->nombre_cliente }} {{ $c->apellido_cliente }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Producto</label>
                    <select id="inventario" name="inventario" class="form-select" aria-label="Default select example" required>
                        <option value="" selected>Seleccionar Producto</option>
                        @foreach ($inventario as $c)
                            <option value="{{ $c->id_inventario }}"> {{ $c->producto }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Cantidad </label>
                    <input type="number" class="form-control" id="cantidad" name="cantidad" required>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"> Fecha Compra </label>
                    <input type="date" class="form-control" id="compra" name="compra" required>
                </div>
                <button type="submit" class="btn btn-primary">Crear Venta</button>
            </form>
        </div>
        <div class="col-md-3"> </div>
    </div>
@endsection
