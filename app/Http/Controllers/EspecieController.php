<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;
use App\Http\Requests\EspeciesRequest;
use Illuminate\Validation\Rule;

class EspecieController extends Controller
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


    public function Especie(){
        return view('Catalogo.CrearEspecie');
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
    public function store(EspeciesRequest $request)
    {
        $especie = new Especie();
        $especie->nom_especie = $request->Especie;
        $especie->save();
        return back()->with('message', 'Creado correctamente');
        return view('crearEspecie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function show(Especie $especie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function edit(Especie $especie)
    {
        $especies = Especie::where('id', $especie->id)->firstOrFail();
        return view('Catalogo.editarEspecie', compact('especies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function update(EspeciesRequest $request, Especie $especie)
    {
        
        $esp = Especie::where('id', $especie->id)->firstOrFail();
        $especie->nom_especie = $request->Especie;
        $especie->save();
        $especies = Especie::where('id', $especie->id)->firstOrFail();
        return back()->with('message', 'Editado correctamente');
        return view('Catalogo.editarEspecie', compact('especies'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Especie  $especie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Especie $especie)
    {
        $especies = Especie::findOrFail($especie ->id);

        $especies -> delete();
        $especies = Especie::all();
        return view('Catalogo.catalogo', compact('especies'));
    }
}
