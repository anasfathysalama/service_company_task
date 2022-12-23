<?php

namespace App\Actions;

use App\Models\Parcel;

class UpdateParcelAction
{

    /**
     * @param $parcelId
     * @return mixed
     */
    public function update($parcelId)
    {
        $parcel = Parcel::find($parcelId);
        $parcel->update(['status' => 'picked_up', 'biker_id' => auth()->user()->id]);
        return $parcel->refresh();
    }

}
