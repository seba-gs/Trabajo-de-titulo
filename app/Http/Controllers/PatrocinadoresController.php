<?php

namespace App\Http\Controllers;

use App\Models\Patrocinador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\PatrocinadoresRequest;

class PatrocinadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth')->except('login');
        $this->middleware('admin')->only('destroy');
    }

    public function patrocinadores(){
        $patrocinadores = Patrocinador::all();
        return view('Patrocinadores.patrocinadores', compact('patrocinadores'));
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
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patrocinador $patrocinador)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patrocinador  $patrocinador
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patrocinador $patrocinador)
    {
        $patrocinadores = Patrocinador::findOrFail($patrocinador -> id);
        $patrocinadores -> delete();
        $patrocinadores = Patrocinador::all();
        return view('Patrocinadores.Patrocinadores', compact('patrocinadores'));
    }
}
