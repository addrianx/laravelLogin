<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name'=>'Admin',
            'email'=>'admin@mailfree.com',
            'password'=>Hash::make('admin1234'),
            'role'=>'admin'
        ]);
    }
}
