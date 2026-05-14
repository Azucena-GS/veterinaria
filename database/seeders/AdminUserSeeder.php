<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Crea los usuarios de prueba por defecto (administrador y veterinario).
     */
    public function run(): void
    {
        User::updateOrCreate(
            ['email' => 'admin@gmail.com'],
            [
                'name'     => 'admin',
                'email'    => 'admin@gmail.com',
                'password' => Hash::make('admin'),
                'rol'      => 'administrador',
            ]
        );

        // Usuario veterinario de prueba
        User::updateOrCreate(
            ['email' => 'veterinario@gmail.com'],
            [
                'name'     => 'veterinario',
                'email'    => 'veterinario@gmail.com',
                'password' => Hash::make('veterinario'),
                'rol'      => 'veterinario',
            ]
        );
    }
}
