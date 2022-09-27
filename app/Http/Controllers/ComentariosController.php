<?php

namespace App\Http\Controllers;

use App\Models\Comentarios;
use App\Http\Controllers\Controller;
use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ComentariosRequest;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function __construct() {
        $this->middleware('auth')->except('login');
    }

    public function comentarios($foto){
        $idfoto = $foto;
        $comentarios = Comentarios::all();
        
        return view('Catalogo.comentarios', [$foto], compact('idfoto', 'comentarios'));
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
    public function store(ComentariosRequest $request, $idfoto)
    {
        $comentario = new Comentarios();
        $comentario -> id_foto = $idfoto;
        $comentario -> id_usuario = Auth::user()->id;
        $comentario -> comentario = $request -> comentario;
        $comentario -> clasificacion = $request -> clasificacion;
        $comentario -> save();
        $comentarios = Comentarios::all();
        $comentarios = Comentarios::where('id_foto', $idfoto)->get();
        return view('Catalogo.comentarios', [$idfoto], compact('idfoto', 'comentarios'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
}
