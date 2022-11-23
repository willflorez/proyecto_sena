<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    public function index()
    {

        $inventario = DB::table('inventario')->get();        
        $data['inventario']  = $inventario;        
        return view('Inventario.index' , $data);
    }

    public function create(Request $request){
        return view('Inventario.create');
    }

    public function post_create(Request $request){

        
        $producto = $request->input('producto');
        $fecha_compra = $request->input('fecha_compra');
        $cantidad = $request->input('cantidad');
        $disponible = $cantidad;
        $precio = $request->input('precio');
        $fechaActual = date('Y-m-d');
 
        $data = array(
                'producto' => $producto,
                'fecha_compra' => $fecha_compra,
                'cantidad' => $cantidad,
                'disponible' => $disponible,
                'precio' => $precio,     
                'fecha_creacion' => $fechaActual,          
        );

        DB::table('inventario')->insert($data);
 
        return redirect()->route('inventario')->with('success', 'Inventario creado con éxito');       
    }


    public function edit(Request $request){

        $id_inventario = $request->input('id_inventario');

        $inventario =  DB::table('inventario')
        ->where('id_inventario','=', $id_inventario)
        ->first();

        $data['inventario']  = $inventario;
        return view('Inventario.edit' , $data);
    }

    public function post_edit(Request $request){

       $id_inventario = $request->input('id_inventario');
       $producto = $request->input('producto');
       $fecha_compra = $request->input('fecha_compra');
       $cantidad = $request->input('cantidad');
       $disponible = $request->input('disponible');
       $precio = $request->input('precio');
       $fechaActual = date('Y-m-d');

       $data = array(
               'producto' => $producto,
               'fecha_compra' => $fecha_compra,
               'cantidad' => $cantidad,
               'disponible' => $disponible,
               'precio' => $precio,     
               'fecha_modificacion' => $fechaActual,          
       );       

       DB::table('inventario')
       ->where('id_inventario','=', $id_inventario)
       ->update($data);              

        return redirect()->route('inventario')->with('success', 'Inventario actualizado con éxito');;
    }

    public function delete(Request $request){

        $id_inventario = $request->input('id_inventario');

        DB::table('inventario')
        ->where('id_inventario','=', $id_inventario)
        ->delete();    
        
        return redirect()->route('inventario')->with('success', 'Inventario eliminado con éxito');;
    }
}
