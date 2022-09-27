<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ComprasRequest;
use App\Models\Fotografia;
use App\Models\Usuario;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('auth')->except('login');
        $this->middleware('admin')->only('destroy, listar');
    }

    public function compra($foto, $valor, $usuario){
        $idfoto = $foto;
        $cantvalor = $valor;
        $idusuario = $usuario;
        return view('Catalogo.Compra', compact('cantvalor', 'idusuario', 'idfoto'));
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
    public function store(ComprasRequest $request, $foto, $valor, $usuario)
    {
        $compra = new Compra();
        $compra -> id_usuario = $usuario;
        $compra -> id_foto = $foto;
        $compra -> valor = $valor;
        $compra -> fecha = date('y-m-d');
        $compra -> transaccion = $request -> transaccion;
        $compra -> save();
        return back()->with('message', 'Creado correctamente');
        return view('general.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function show(Compra $compra)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function edit(Compra $compra)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Compra $compra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Compra  $compra
     * @return \Illuminate\Http\Response
     */
    public function destroy($compra, $foto)
    {
        $compras = Compra::findOrFail($compra);
        $compras -> delete();
        $compras = Compra::where('id_foto', $foto)->get();
        $fotografia = Fotografia::where('id', $foto)->first();
        $usuarios = Usuario::all();
        return view('Catalogo.ListarCompras', compact('compras', 'usuarios', 'fotografia'));
    }

    public function listar($foto){
        $compras = Compra::where('id_foto', $foto)->get();
        $fotografia = Fotografia::where('id', $foto)->first();
        $usuarios = Usuario::all();
        return view('Catalogo.ListarCompras', compact('compras', 'usuarios', 'fotografia'));
    }
}
