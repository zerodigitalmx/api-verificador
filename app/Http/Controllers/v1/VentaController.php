<?php

namespace App\Http\Controllers\v1;

use App\Models\DiarioVtasPvUR;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class VentaController extends BaseController
{
    /**
     * Listado de ventas
     */
    public function paging(
        Request $request,
        DiarioVtasPvUR $model
    ) {
        try {
            // TODO: renombrar correctamente los parametros de manera que sea implicita su funcionalidad
            //  ver como se va a manejar los defaults
            $param1 = $request->input('param1', '01.01.2020');
            $param2 = $request->input('param2', '01.01.2021');
            $records = $model->get($param1, $param2);
            return response()->json($records);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
