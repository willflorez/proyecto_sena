<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientesController extends Controller
{
 
    public function index()
    {
        

        $clientes = DB::table('cliente')->get();        
        $data['clientes']  = $clientes;
        return view('Clientes.index', $data);
    }

    public function create(Request $request){
        return view('Clientes.create');
    }

    public function post_create(Request $request){
        $id_cliente = $request->input('id_cliente');
        $nombre_cliente = $request->input('nombre_cliente');
        $apellido_cliente = $request->input('apellido_cliente');
        $numero_documento = $request->input('numero_documento');
        $telefono_cliente = $request->input('telefono_cliente');        
        $fechaActual = date('Y-m-d');

        $data = array(
            'nombre_cliente' => $nombre_cliente,
            'apellido_cliente' => $apellido_cliente,
            'numero_documento' => $numero_documento,
            'telefono_cliente' => $telefono_cliente,  
            'fecha_creacion' => $fechaActual,                         
    );
     

    DB::table('cliente')    
    ->insert($data);              

     return redirect()->route('clientes')->with('success', 'Cliente creado con éxito');;
    }

    public function edit(Request $request){
        $id_cliente = $request->input('id_cliente');

        $cliente =  DB::table('cliente')
        ->where('id_cliente','=', $id_cliente)
        ->first();

        $data['cliente']  = $cliente;

        return view('Clientes.edit' , $data);
    }

    public function post_edit(Request $request){
        $id_cliente = $request->input('id_cliente');
        $nombre_cliente = $request->input('nombre_cliente');
        $apellido_cliente = $request->input('apellido_cliente');
        $numero_documento = $request->input('numero_documento');
        $telefono_cliente = $request->input('telefono_cliente');        
        $fechaActual = date('Y-m-d');

        $data = array(
                'nombre_cliente' => $nombre_cliente,
                'apellido_cliente' => $apellido_cliente,
                'numero_documento' => $numero_documento,
                'telefono_cliente' => $telefono_cliente,  
                'fecha_actualizacion' => $fechaActual,                         
        );
         
 
        DB::table('cliente')
        ->where('id_cliente','=', $id_cliente)
        ->update($data);              
 
         return redirect()->route('clientes')->with('success', 'Cliente actualizado con éxito');;
    }

    public function delete(Request $request){
        $id_cliente = $request->input('id_cliente');

           

        $ventas = DB::table('ventas')
        ->join('cliente','cliente.id_cliente','=','ventas.id_cliente')        
        ->where('cliente.id_cliente' , '=',$id_cliente)
        ->count();

        if ($ventas >= 1) {
            return redirect()->route('clientes')->with('danger', 'No se puede eliminar el cliente. Tiene ventas registradas');
        }

        DB::table('cliente')
        ->where('id_cliente','=', $id_cliente)
        ->delete(); 

        return redirect()->route('clientes')->with('success', 'Cliente eliminado con éxito');
    }
}
