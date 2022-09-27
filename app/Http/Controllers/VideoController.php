<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\VideosRequest;

class VideoController extends Controller
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

    public function video(){
        $videos = Video::all();
        return view('Catalogo.videos', compact('videos'));
    }
    
    public function crearVideo(){
        return view('Catalogo.crearVideos');
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
        $video = new Video();
        $video -> id_admin = Auth::user()->rol_id;;
        $video -> nombre = $request -> Nombre;
        $video -> descripcion = $request -> Descripcion;
        $video -> link = $request -> Link;
        $video -> save();
        return back()->with('message', 'Creado correctamente');
        return view('Catalogo.crearVideos');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        $videos = Video::where('id', $video->id)->firstOrFail();
        return view('Catalogo.editarVideos', compact('videos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $videos = Video::where('id', $video->id)->firstOrFail();
        $videos -> nombre= $request -> Nombre;
        $videos -> descripcion= $request -> Descripcion;
        $videos -> link= $request -> Link;
        $videos -> save();
        $videos = Video::where('id', $video->id)->firstOrFail();
        return back()->with('message', 'Editado correctamente');
        return view('Catalogo.editarVideos', compact('videos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        $videos = Video::findOrFail($video -> id);
        $videos -> delete();
        $videos = Video::all();
        return view('Catalogo.videos', compact('videos'));
    }
}
