<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=>'superAdmin',
            'email'=>'super@gmail.com',
            'password'=>bcrypt('123456'),
            'role'=>'superAdmin'
        ]);
    }
}
