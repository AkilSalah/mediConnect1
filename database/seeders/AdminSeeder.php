<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
        public function run(): void
        {
          $user= User::create([
                'name' => 'Karim',
                'email' => 'Karim@gmail.com',
                'password' => Hash::make('Karim@gmail.com'),
                'role' => 'Admin',
            ]);
            $admin = Admin::create([
                'id_user' => $user->id,
            ]);
    
        }
    
}
