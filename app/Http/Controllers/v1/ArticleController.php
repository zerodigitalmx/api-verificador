<?php

namespace App\Http\Controllers\v1;

use App\Models\PrecioArtCliEUR;
use App\Models\PrecioArtCliClavesUR;
use App\Models\PrecioArtCliNombresUR;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class ArticleController extends BaseController
{
    protected $repository;
    protected $repository2;
    protected $repository3;

    public function __construct(
        PrecioArtCliClavesUR $repository,
        PrecioArtCliEUR $repository2,
        PrecioArtCliNombresUR $repository3

    ) {
        $this->repository = $repository;
        $this->repository2 = $repository2;
        $this->repository3 = $repository3;
    }
    
    /**
     * Get by like clave
     */
    public function getLikeClave(
        Request $request,
        $id
    ) {
        $data = null;
        try {
            $almacenId = $request->header('ALMACEN_ID', 19);
            $clienteId = $request->header('CLIENTE_ID', 0);
            $records = $this->repository->get($id, $almacenId, $clienteId);
            if (count($records)) {
                //Selecciona la casilla de record que desee que te traiga el responsive
                $data = $records;
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    /**
     * Funcion para retornar articulo por clave
     */
    public function getByClave(
        Request $request,
        $id
    ) {
        $data = null;
        try {
            $almacenId = $request->header('ALMACEN_ID', 19);
            $clienteId = $request->header('CLIENTE_ID', 0);
            $records = $this->repository2->get($id, $almacenId, $clienteId);
            if (count($records)) {
                $data = $records[0];
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }


    /**
     * Funcion para retornar articulos Nombres por like %
     */
    public function getLikeName(
        Request $request,
        $nombre
    ) {
        $data = null;
        try {
            //ifelse 
            $almacenId = $request->header('ALMACEN_ID', 19);
            $clienteId = $request->header('CLIENTE_ID', 0);
            $records = $this->repository3->get($nombre, $almacenId, $clienteId);
            if (count($records)) {
                $data = $records;
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
