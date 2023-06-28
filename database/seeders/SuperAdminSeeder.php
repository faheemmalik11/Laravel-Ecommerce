<?php

namespace Database\Seeders;

use App\Models\Cart;
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
        $user = User::create([
            'name' => 'Super Admin',
            'email' => 'qazizubair0309@gmail.com',
            'password' => 'password123',
            'profile_image' => 'store/images/super_admin.jpg',
            'role_id' => 2
        ]);

        // Create the cart associated with the user
        $cart = new Cart();
        $user->cart()->save($cart);
    }

    
}
