<?php

namespace App\Http\Controllers;
use App\Models\Articulos;
use App\Models\DiarioVtasPvUR;
use App\Models\Moneda;
use App\Models\PrecioArtCliEUR;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{
//Funcion para el endpoint VENTAS
    public function myfun(
        Request $request,
        DiarioVtasPvUR $model
    )
    {
        try {
            $param1 = $request->input('param1');
            $param2 = $request->input('param2');
            $records =$model->get($param1,$param2);
            return response()->json($records);
        } catch (\Throwable $th) {
            dd($th);
        } 
    }


//Funcion para el endpoint Monedas 
    public function index(
        Moneda $moneda
    ) {
        try {
            $records = $moneda->all();
            return response()->json($records);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
