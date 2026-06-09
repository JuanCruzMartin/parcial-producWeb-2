<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        User::firstOrCreate(
            ['email' => 'admin@servicio.com'],
            [
                'name'     => 'Administrador',
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
