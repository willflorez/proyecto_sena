<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedoresController extends Controller
{
 
    public function index()
    {
        //CONSULTA A BASE DE DATOS
        // VARIABLE $proveedores
        $proveedores = DB::table('proveedores')->get();        
        $data['proveedores']  = $proveedores;
        $data['algo']  = "Este es un nuevo campo";
        return view('Proveedores.index', $data);
    }

    public function create(Request $request){
        return view('Proveedores.create');
    }

    public function post_create(Request $request){
        
        $nombre_proveedores = $request->input('nombre_proveedores');
        $apellido_proveedores = $request->input('apellido_proveedores');
        $numero_documento = $request->input('numero_documento');
        $telefono_proveedores = $request->input('telefono_proveedores');        
        $fechaActual = date('Y-m-d');

        $data = array(
            'nombre_proveedores' => $nombre_proveedores,
            'apellido_proveedores' => $apellido_proveedores,
            'numero_documento' => $numero_documento,
            'telefono_proveedores' => $telefono_proveedores,  
            'fecha_creacion' => $fechaActual,                         
        );
     

    DB::table('proveedores')    
    ->insert($data);             

     return redirect()->route('proveedores')->with('success', 'Proveedor creado con éxito');
    }

    public function edit(Request $request){
        $id_proveedores = $request->input('id_proveedores');

        $proveedores =  DB::table('proveedores')
        ->where('id_proveedores','=', $id_proveedores)
        ->first();

        $data['proveedores']  = $proveedores;

        return view('Proveedores.edit' , $data);
    }

    public function post_edit(Request $request){
        $id_proveedores = $request->input('id_proveedores');
        $nombre_proveedores = $request->input('nombre_proveedores');
        $apellido_proveedores = $request->input('apellido_proveedores');
        $numero_documento = $request->input('numero_documento');
        $telefono_proveedores = $request->input('telefono_proveedores');        
        $fechaActual = date('Y-m-d');

        $data = array(
                'nombre_proveedores' => $nombre_proveedores,
                'apellido_proveedores' => $apellido_proveedores,
                'numero_documento' => $numero_documento,
                'telefono_proveedores' => $telefono_proveedores,  
                'fecha_actualizacion' => $fechaActual,                         
        );
         
 
        DB::table('proveedores')
        ->where('id_proveedores','=', $id_proveedores)
        ->update($data);              
 
         return redirect()->route('proveedores')->with('success', 'Proveedor actualizado con éxito');;
    }

    public function delete(Request $request){

        $id_proveedores = $request->input('id_proveedores');        

        DB::table('proveedores')
        ->where('id_proveedores','=', $id_proveedores)
        ->delete(); 

        return redirect()->route('proveedores')->with('success', 'Proveedor eliminado con éxito');
    }
}
