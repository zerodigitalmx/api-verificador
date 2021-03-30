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
            $records = $model->get([
                'start' => $request->input('startDate', '01.01.2020'),
                'end' => $request->input('endDate', '01.01.2021'),
            ]);
            return response()->json($records);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
