<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use PDF;
use App\Mail\TestMail;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function listadoPDF() {
        $clientes = Cliente::orderBy('id')->limit(30)->get();
        $pdf = PDF::loadView('clientes.pdf', compact("clientes"));
        return $pdf->download('lista_clientes.pdf');
    }

    public function index()
    {
        //
        $clientes=Cliente::orderBy("id")->get();
        return view("clientes.index",compact("clientes"));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|regex:/^[0-9]{8}[a-zA-Z]$/i',
        ]);





        $datos=$request->all();
        $datos['id']=uniqid();
        Cliente::create($datos);
        return redirect('/clientes');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $cliente=Cliente::find($id);
		return view("clientes.create",compact("cliente"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        
        $validated = $request->validate([
            'nombre' => 'required|string',
            'apellidos' => 'required|string',
            'dni' => 'required|regex:/^[0-9]{8}[a-zA-Z]$/i',
        ]);

        $datos=$request->all();
        Cliente::find($id)->update($datos);
        return redirect('/clientes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $cliente=Cliente::find($id);
        if ($cliente) {
            $cliente->delete();
            return 'ok';
        }
        else {
            return 'error';
        }
    }
}
