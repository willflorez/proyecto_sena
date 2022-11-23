<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VentaController extends Controller
{    
    public function index()
    {
        $ventas = DB::table('ventas')
        ->join('cliente','cliente.id_cliente','=','ventas.id_cliente')
        ->join('inventario','inventario.id_inventario','=','ventas.id_inventario')
        ->where('status_ventas', '<>' , '1')
        ->get();       
        $data['ventas']  = $ventas;        
        return view('Ventas.index', $data);
    }

    public function create(Request $request)
    {
        $cliente = DB::table('cliente')->get();
        $inventario = DB::table('inventario')->get();
        $data['cliente']  = $cliente;  
        $data['inventario']  = $inventario;     
        return view('Ventas.create' , $data);
    }

    public function post_create(Request $request)
    {
        $cliente = $request->input('cliente');
        $inventario = $request->input('inventario');
        $cantidad = $request->input('cantidad');
        $compra = $request->input('compra');
        $fechaActual = date('Y-m-d');

        $inventario_act = DB::table('inventario')
        ->where('id_inventario','=',$inventario)
        ->first();

        $inventario_data = DB::table('inventario')
        ->where('id_inventario' ,  '=' , $inventario)
        ->first();

        $precio = ($inventario_data->precio * $cantidad);

        $new_disponible = ($inventario_act->disponible - $cantidad);

        if($new_disponible < 0){
            return redirect()->route('ventas')->with('danger', 'No se puede crear la venta, solo hay ' . $inventario_act->disponible . ' Disponibles');
        }

        $data = array(
                   'id_cliente' => $cliente,
                   'id_inventario' => $inventario,
                   'cantidad_c' => $cantidad,
                   'precio_v' => $precio,
                   'fecha_compra' => $compra,
                   'fecha_creacion' => $fechaActual,
                   'status_ventas' => 0,
        );

        /** Se crea la venta */

        DB::table('ventas')
        ->insert($data);

        /** Se actualiza el disponible */
        DB::table('inventario')
        ->where('id_inventario' ,  '=' , $inventario)
        ->update(['disponible' => $new_disponible]);

        return redirect()->route('ventas')->with('success', 'Venta creada con éxito');   

    }

    public function edit(Request $request)
    {
        //
    }

    public function post_edit(Request $request)
    {
        //
    }

    public function delete(Request $request)
    {
       
        $id_ventas = $request->input('id_ventas');

        $venta = DB::table('ventas')
        ->where('id_ventas' , '=' ,  $id_ventas)
        ->first();

        //Consultamos la tabla ventas para traer el id
        $inventario = DB::table('inventario')
        ->where('id_inventario' , '=' , $venta->id_inventario )
        ->first();

        $update_inv = DB::table('inventario')
        ->where('id_inventario' , '=' , $inventario->id_inventario )
        ->update(['disponible' => ($venta->cantidad_c + $inventario->disponible)]);
        
        DB::table('ventas')
        ->where('id_ventas','=',$id_ventas)
        ->update(['status_ventas' => 1]);

        return redirect()->route('ventas')->with('success', 'Venta eliminada con éxito'); 
    }
}
