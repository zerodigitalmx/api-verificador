<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class DiarioVtasPvUR extends Model
{
    protected $table = 'DIARIO_VTAS_PV_UR';

    public function get($input)
    {
        list('start' => $start, 'end' => $end) = $input;

        $currentPage =  LengthAwarePaginator::resolveCurrentPage();
        $perPage = 50;
        $query = DB::select("SELECT * FROM {$this->getTable()}('$start', '$end')");
        $itemCollection = collect($query);

        $currentPageItems = $itemCollection->slice(($currentPage * $perPage) - $perPage, $perPage)->values();

        return new LengthAwarePaginator(
            $currentPageItems,
            count($itemCollection),
            $perPage
        );;
    }
}
