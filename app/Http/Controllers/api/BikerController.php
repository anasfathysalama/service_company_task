<?php

namespace App\Http\Controllers\api;


use App\Http\Controllers\Controller;
use App\Models\Parcel;
use App\Traits\ApiResponseTrait;

class BikerController extends Controller
{
    use ApiResponseTrait;

    public function __invoke()
    {
        $data = Parcel::query()->where('status', 'new')->get();
        return $this->apiSuccessResponse($data);
    }
}
