<?php

namespace App\Actions;

use App\Models\Parcel;

class StoreParcelAction
{

    /**
     * @param $request
     * @return mixed
     */
    public function create($request)
    {
        return Parcel::create([
            'pick_up_address' => $request['pick_up_address'],
            'drop_off_address' => $request['drop_off_address'],
            'sender_id' => auth()->user()->id,
            'status' => 'new',
        ]);
    }

}
