<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DiarioVtasPvUR extends Model
{
    protected $table = 'DIARIO_VTAS_PV_UR';


    public function get($param1, $param2)
    {
        $query = "select * from {$this->getTable()}('$param1', '$param2')";
        $ventas = DB::select($query);
        return $ventas;
    }
}
