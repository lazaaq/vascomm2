<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $userAdmin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'admin',
        ]);
        $userCustomer = User::create([
            'name' => 'Customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('12345678'),
            'role' => 'customer',
        ]);

        $customer = Customer::create([
            'user_id' => $userCustomer->id,
            'telp' => '08123456789',
            'status' => true
        ]);
        
        $product = Product::create([
            'name' => 'Product 1',
            'price' => 10000,
            'image' => 'https://via.placeholder.com/150',
            'status' => true
        ]);
    }
}
