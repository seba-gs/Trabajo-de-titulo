<?php

namespace App\Http\Controllers;

use App\Models\Noticia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\NoticiaRequest;

class CrearNoticaController extends Controller
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

    public function crearNoticia(){
        $noticias = Noticia::all();
        return view('Noticias.crearNoticia', compact('noticias'));
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
    public function store(NoticiaRequest $request)
    {
        $noticia = new Noticia();
        $noticia->id_admin = Auth::user()->rol_id;
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request-> descripcion;
        $noticia->fecha = date('y-m-d');
        $noticia->save();
        return back()->with('message', 'Creado correctamente');
        return redirect()->route('crearNoticia');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $noticia)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $noticia)
    {
        $noticias = Noticia::where('id', $noticia->id)->firstOrFail();
        return view('Noticias.editarNoticia', compact('noticias'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(NoticiaRequest $request, Noticia $noticia)
    {
        $noticias = Noticia::where('id', $noticia->id)->firstOrFail();
        $noticia->titulo = $request->titulo;
        $noticia->descripcion = $request-> descripcion;
        $noticia->save();
        return back()->with('message', 'Editado correctamente');
        return redirect()->route('noticia');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $noticia)
    {
        $noticias = Noticia::findOrFail($noticia ->id);

        $noticias -> delete();
        $noticias = Noticia::all();
        return view('Noticias.noticia', compact('noticias'));
    }
}
