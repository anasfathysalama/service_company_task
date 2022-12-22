<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class StoreUserAction
{
    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'type' => $data['type']
        ]);
    }
}
