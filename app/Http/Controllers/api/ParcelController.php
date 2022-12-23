<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Parcel;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    use ApiResponseTrait;

    public function __invoke()
    {
        $data = Parcel::query()->get();
        return $this->apiSuccessResponse($data);
    }
}
