<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PerfilController extends Controller
{
    public function __construct() {
        $this->middleware('auth')->except('login');
    }

    public function perfil(){
        return view('Perfil.perfil');
    }
}
