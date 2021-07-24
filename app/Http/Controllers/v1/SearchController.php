<?php

namespace App\Http\Controllers\v1;

use App\Models\PrecioArtCliNombresUR;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\Controller as BaseController;

class SearchController extends BaseController
{
    protected $repoArticle;

    public function __construct(
        PrecioArtCliNombresUR $repoArticle

    ) {

        $this->repoArticle = $repoArticle;
    }

    /**
     * Funcion para retornar articulos Nombres por like %
     */
    public function searchLike(
        Request $request        
    ) {
        $data = null;
        try {
            // $type = $request->input('type', 'article');
            $name = $request->input('name', '');    
            $almacenId = $request->header('ALMACEN_ID', 19);
            $clienteId = $request->header('CLIENTE_ID', 0);
            $records = $this->repoArticle->get( str_ireplace("'",  "''", $name), $almacenId, $clienteId);
            if (count($records)) {
                $data = $records;
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            dd($th);
        }
    }
}
