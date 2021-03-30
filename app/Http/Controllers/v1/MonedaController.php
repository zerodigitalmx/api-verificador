<?php

namespace App\Http\Controllers\v1;

use App\Models\Moneda;
use Laravel\Lumen\Routing\Controller as BaseController;

class MonedaController extends BaseController
{
    //Funcion para el endpoint Monedas 
    public function paging(
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
