<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrecioArtCliNombresUR extends Model
{

    protected $table = 'GET_PRECIO_ART_CLI_NOMBRES_UR';

    public function get($nombre, $almacenId, $clienteId)
    {
        $query = "SELECT * FROM {$this->getTable()}($clienteId,'$nombre',$almacenId)";
        $articulos = DB::select($query);
        return $articulos;
    }
}
