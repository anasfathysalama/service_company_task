<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => "biker_{$i}",
                'username' => "biker_{$i}",
                'password' => Hash::make('123456'),
                'type' => 'biker'
            ]);
        }

        for ($i = 1; $i <= 5; $i++) {
            User::create([
                'name' => "sender_{$i}",
                'username' => "sender_{$i}",
                'password' => Hash::make('123456'),
                'type' => 'sender'
            ]);
        }
    }
}
