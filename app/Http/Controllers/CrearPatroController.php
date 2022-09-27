<?php

namespace App\Http\Controllers;

use App\Models\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Requests\PatrocinadoresRequest;

class CrearPatroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth')->except('login');
        $this->middleware('admin')->only('store, edit, update, destroy');
    }


    public function crearPatrocinador(){
        return view('Patrocinadores.crearPatro');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatrocinadoresRequest $request)
    {
        $patrocinador = new Patrocinador();
        $patrocinador-> nombre = $request->Nombre;
        $patrocinador-> descripcion = $request -> Descripcion;
        $patrocinador-> facebook = $request -> Facebook;
        $patrocinador-> instagram = $request -> Instagram;
        $patrocinador-> email = $request -> Email;
        $patrocinador->save();
        return back()->with('message', 'Creado correctamente');
        return redirect()->route('patrocinadores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function show(Patrocinador $patrocinador)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function edit(Patrocinador $patrocinador)
    {
        $patro = Patrocinador::where('id', $patrocinador->id)->firstOrFail();
        return view('Patrocinadores.editarPatrcinador', compact('patro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function update(PatrocinadoresRequest $request, Patrocinador $patrocinador)
    {
        $patro = Patrocinador::where('id', $patrocinador->id)->firstOrFail();
        $patrocinador-> nombre = $request->Nombre;
        $patrocinador-> descripcion = $request -> Descripcion;
        $patrocinador-> facebook = $request -> Facebook;
        $patrocinador-> instagram = $request -> Instagram;
        $patrocinador-> email = $request -> Email;
        $patrocinador->save();
        return back()->with('message', 'Editado correctamente');
        return redirect()->route('patrocinadores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patrocinador $patrocinador)
    {
        $patrocinadores = Patrocinador::findOrFail($patrocinador ->id);

        $patrocinadores -> delete();
        $patrocinadores = Patrocinador::all();
        return view('Patrocinadores.Patrocinadores', compact('patrocinadores'));
    }
}
