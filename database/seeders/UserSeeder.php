<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
           $super_admin = User::create([
            'name' => 'Super Admin',
            'email' => 'sprmeubeladji@gmail.com',
            'password' => bcrypt('Meubel*606'),
        ]);

        $super_admin->assignRole('super_admin');

        $admin = User::create([
            'name' => 'Admin',
            'email' => 'adminmeubel@gmail.com',
            'password' => bcrypt('MeubelAdjie*'),
        ]);

        $admin->assignRole('admin');

         $peserta = User::create([
            'name' => 'peserta',
            'email' => 'peserta@gmail.com',
            'password' => bcrypt('peserta123'),
        ]);

        $peserta->assignRole('peserta');
    }
    }

