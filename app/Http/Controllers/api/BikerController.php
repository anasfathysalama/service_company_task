<?php

namespace App\Http\Controllers\api;

use App\Actions\StoreOrderAction;
use App\Actions\UpdateParcelAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\PickedParcelRequest;
use App\Models\Parcel;
use App\Traits\ApiResponseTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BikerController extends Controller
{
    use ApiResponseTrait;

    public function index()
    {
        $data = Parcel::query()->where('status', 'new')->get();
        return $this->apiSuccessResponse($data);
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
            $parcel = $parcelAction->update($request->id);
            $orderAction->create($request->all(), $parcel);
            return $this->apiSuccessResponse([], 'Picked Successfully');
        } catch (\Exception $exception) {
            return $this->apiErrorResponse([]);
        }
    }
}
