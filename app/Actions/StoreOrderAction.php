<?php

namespace App\Actions;

use App\Models\Order;

class StoreOrderAction
{
    public function create($request , $parcel)
    {
      Order::create([
          'biker_id' => auth()->user()->id,
          'parcel_id' => $parcel->id,
          'pick_up_time' => $request['pick_up_time'],
          'delivered_time' => $request['delivered_time'],
      ]);
    }
}
