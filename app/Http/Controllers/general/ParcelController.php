<?php

namespace App\Http\Controllers\general;

use App\Actions\StoreParcelAction;
use App\Datatables\SenderParcelsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParcelRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ParcelController extends Controller
{
    use ApiResponseTrait;


    public function index()
    {
        return view('sender_dashboard');
    }

    /**
     * @param ParcelRequest $request
     * @param StoreParcelAction $parcelAction
     * @return JsonResponse
     */
    public function store(ParcelRequest $request, StoreParcelAction $parcelAction): JsonResponse
    {
        try {
            $parcel = $parcelAction->create($request->validated());
            return $this->apiSuccessResponse($parcel, 'created successfully', 201);
        } catch (\Exception $exception) {
            return $this->apiErrorResponse();
        }
    }

    public function getData(SenderParcelsDatatable $datatable)
    {
        return $datatable->getAllData();
    }
}
