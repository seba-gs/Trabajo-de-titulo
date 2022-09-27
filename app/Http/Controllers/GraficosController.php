<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\Fotografia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GraficosController extends Controller
{

    public function __construct() {
        $this->middleware('auth')->except('login');
        $this->middleware('admin')->only('index');
    }

    public function index(){
        $compras = Compra::select (DB::raw("COUNT(*) as count"))
            ->whereYear('fecha', date('Y'))
            ->groupBy(DB::raw("Month(fecha)"))
            ->pluck('count');
        
        $meses = Compra::select (DB::raw("Month(fecha) as month"))
            ->whereYear('fecha', date('Y'))
            ->groupBy(DB::raw("Month(fecha)"))
            ->pluck('month');

        $datas = array(0,0,0,0,0,0,0,0,0,0,0,0);
        foreach ($meses as $id => $mes){
            $datas[$mes-1] = $compras[$id];
        }
        $total = 0;
        $cantidad = 0;
        $ventas = Compra::whereYear('fecha', date('Y'))->get();
        foreach($ventas as $venta){
            $total = $total + $venta->valor;
            $cantidad = $cantidad + 1;
        };

        $idF = DB::select('SELECT id_foto, count(*) as cont
                                    FROM Compras
                                    GROUP BY id_foto
                                    HAVING COUNT(*)>=1
                                    ORDER BY cont ASC');
        
        $menosVendido = Fotografia::where('id', $idF[0]->id_foto)->first();
        $cont = sizeof($idF);
        $masVendido = Fotografia::where('id', $idF[$cont - 1]->id_foto)->first();
        

        return view('Graficos.GraficoGeneral', compact('datas', 'total', 'cantidad', 'menosVendido', 'masVendido'));
    }
}
