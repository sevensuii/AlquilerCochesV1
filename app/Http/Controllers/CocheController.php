<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $coches=Coche::orderBy("id")->get();
        return view("coches.index",compact("coches"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('coches.create');
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
            'año' => 'required|max:4|min:4',
            'matricula' => 'regex:/^[0-9]{4}-[a-zA-Z]{3}$/i',
            'observaciones' => 'required|min:5|max:255',
        ]);



        $datos=$request->all();
        $datos['id']=uniqid();
        Coche::create($datos);
        return redirect('/coches');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function show(Coche $coche)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $coche=Coche::find($id);
		return view("coches.create",compact("coche"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $datos=$request->all();
        Coche::find($id)->update($datos);
        return redirect('/coches');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Coche  $coche
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $coche=Coche::find($id);
        if ($coche) {
            $coche->delete();
            return 'ok';
        }
        else {
            return 'error';
        }
    }
}
