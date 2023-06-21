<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

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
            'name' => 'Super Admin',
            'email' => 'qazizubair0309@gmail.com',
            'password' => bcrypt('password123'), // password
            'profile_image'=> 'store/images/super_admin.jpg', 
            'role_id'=>2
        ]);
        
    }
}
