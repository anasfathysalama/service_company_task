<?php

namespace App\Http\Controllers\general;

use App\Datatables\ParcelsDatatable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BikerController extends Controller
{
    public function getData(ParcelsDatatable $datatable)
    {
        return $datatable->getAllData();
    }
}
