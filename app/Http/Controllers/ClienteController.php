<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{

    public function index()
    {

        return Cliente::all();
    }


    public function store(Request $request)
    {
        //validacion para que reciba esos campos
        $request->validate(
            [
                'nombres'=>'required',
                'apellidos'=>'required'
            ]
        );

        $cliente= new Cliente();

        $cliente->nombres   =$request->nombres;
        $cliente->apellidos =$request->apellidos;
        $cliente->save();

        return $cliente;


    }


    public function show(Cliente $cliente)
    {
        //
        return $cliente;
    }


    public function update(Request $request, Cliente $cliente)
    {
        //
        $request->validate(
            [
                'nombres'=>'required',
                'apellidos'=>'required'
            ]
        );

        $cliente= new Cliente();

        $cliente->nombres   =$request->nombres;
        $cliente->apellidos =$request->apellidos;
        $cliente->update();

        return $cliente;
    }


    public function destroy($id)
    {
        //
        $cliente= Cliente::find($id);
        if(is_null($cliente))
        {
            return response()->json('No se pudo realizar correctamente en la aplicacion',404);
        }

        $cliente->delete();
        return response()->noContent();
    }
}
