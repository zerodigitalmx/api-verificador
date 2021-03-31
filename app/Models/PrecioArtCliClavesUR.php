<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PrecioArtCliClavesUR extends Model
{
    protected $table = 'GET_PRECIO_ART_CLI_CLAVES_UR';

    public function get($clave, $almacenId, $clienteId)
    {
        return DB::select("SELECT * FROM {$this->getTable()}($clienteId,'$clave',$almacenId)");
    }
}
