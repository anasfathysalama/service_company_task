<?php

namespace App\Http\Controllers\general;

use App\Actions\StoreOrderAction;
use App\Actions\UpdateParcelAction;
use App\Datatables\BikerParcelsDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PickedParcelRequest;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BikerController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        return view('biker_dashboard');
    }

    public function getData(BikerParcelsDatatable $datatable)
    {
        return $datatable->getAllData();
    }

    /**
     * @param PickedParcelRequest $request
     * @param UpdateParcelAction $parcelAction
     * @param StoreOrderAction $orderAction
     * @return JsonResponse
     */
    public function pickUpParcel(PickedParcelRequest $request, UpdateParcelAction $parcelAction, StoreOrderAction $orderAction)
    {
        try {
            $parcel = $parcelAction->update($request->parcel_id);
            $orderAction->create($request->all(), $parcel);
            return $this->apiSuccessResponse([], 'Picked Successfully');
        } catch (\Exception $exception) {
            return $this->apiErrorResponse([]);
        }
    }
}
