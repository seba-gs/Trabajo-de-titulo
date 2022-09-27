<?php

namespace App\Http\Controllers;

use App\Models\{Usuario, Rol};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\{Auth, Hash};
use phpDocumentor\Reflection\PseudoTypes\True_;
use App\Http\Requests\UsuariosRequest;



class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware('admin')->only('update, usuarios, activar, nuevoUsuario, crear, editar');
    }

    public function index()
    {
        return view('login.login');
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
    public function store(UsuariosRequest $request)
    {
         if($request -> password == $request -> cpassword){
            $usuario = new Usuario();
            $usuario->Email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->Nombre = $request->nombre;
            $usuario->Apellido = $request->apellido;
            $usuario->nombre_usuario = $request->nomUsuario;
            $usuario->rol_id = 2;
            $usuario->save();
            return back()->with('message', 'Usuario creado correctamente');
            return redirect()->route('registro');
         }else{
            return back()->withErrors('contraseñas no coinciden');
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario, $id_usuario)
    {
        $usuario = Usuario::where('id', $id_usuario)->firstOrFail();
        $usuario->Email = $request->email;
        $usuario->password = Hash::make($request->password);
        $usuario->nombre_usuario = $request->nomUsuario;
        $usuario->rol_id = $request -> rol_id;
        $usuario->save();
        $roles = Rol::all();return back()->with('message', 'Usuario editado correctamente');
        return view('general.EditarUsuario', compact('roles', 'usuario', 'id_usuario'));
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }

    public function login(Request $request){
          $credenciales = [
             'email' => $request['email'],
             'password' => $request['password'],
         ];

        // $credenciales = $request->only('email','password');

        if(Auth::attempt(['Email'=>$request->email,'password'=>$request->password, 'activo'=>true])){
            //Credenciales correctas ingresadas
            $usuario = Usuario::where('Email', $request->email)->first();
            return redirect()->route('inicio');
        }else{
            //credenciales incorrectas
            return back()->withErrors('Datos incorrectos o cuenta deshabilitada');
        }
    }

    public function logout(){
        
        Auth::logout();
        return redirect()->route('inicio');
    }

    public function registro()
    {
        return view('Registro.registro');
    }

    public function usuarios(){
        $usuarios = Usuario::all();
        return view('general.Usuarios', compact('usuarios'));
    }

    public function activar(Usuario $usuario){
        $usuario -> activo = $usuario -> activo?0:1;
        $usuario -> save();
        $usuarios = Usuario::all();
        return redirect()->route('usuarios', compact('usuarios'));
    }

    public function nuevoUsuario(){
        $roles = Rol::all();
        return view('general.CrearUsuario', compact('roles'));
    }

    public function crear(UsuariosRequest $request)
    {
         if($request -> password == $request -> cpassword){
            $usuario = new Usuario();
            $usuario->Email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->Nombre = $request->nombre;
            $usuario->Apellido = $request->apellido;
            $usuario->nombre_usuario = $request->nomUsuario;
            $usuario->rol_id = $request -> rol_id;
            $usuario->save();
            $roles = Rol::all();
            return back()->with('message', 'Usuario creado correctamente');
            return view('general.CrearUsuario', compact('roles'));
         }else{
            return back()->withErrors('contraseñas no coinciden');
         }
    }

    public function editar($id_usuario){
        $usuario = Usuario::where('id', $id_usuario)->firstOrFail();
        $roles = Rol::all();
        return view('general.EditarUsuario', compact('roles', 'usuario'));
    }
}
