<?php

namespace App\Http\Controllers\v1;

use App\Models\DiarioVtasPvUR;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class VentaController extends BaseController
{
    //Funcion para el endpoint VENTAS
    public function myfun(
        Request $request,
        DiarioVtasPvUR $model
    ) {
        try {
            $param1 = $request->input('param1');
            $param2 = $request->input('param2');
            $records = $model->get($param1, $param2);
            return response()->json($records);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
