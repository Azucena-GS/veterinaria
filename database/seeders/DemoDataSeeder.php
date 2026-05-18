<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dueno;
use App\Models\Mascota;
use App\Models\Consulta;
use App\Models\Veterinario;
use App\Models\User;
use Carbon\Carbon;

class DemoDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Obtener o crear un veterinario
        $veterinario = Veterinario::first();

        if (!$veterinario) {
            $usuarioVet = User::create([
                'name' => 'Dr. Juan Pérez',
                'email' => 'juan.perez@veterinaria.com',
                'password' => bcrypt('password'),
                'rol' => 'veterinario',
            ]);

            $veterinario = Veterinario::create([
                'usuario_id' => $usuarioVet->id,
                'nombre_completo' => 'Dr. Juan Pérez',
            ]);
        }

        // 2. Crear un dueño
        $dueno = Dueno::create([
            'nombre_completo' => 'Carlos Martínez',
            'telefono' => '555-1234-567',
            'direccion' => 'Calle Falsa 123, Ciudad',
        ]);

        // 3. Crear una mascota
        $mascota = Mascota::create([
            'dueno_id' => $dueno->id,
            'nombre' => 'Firulais',
            'especie' => 'Perro',
            'raza' => 'Golden Retriever',
            'fecha_nacimiento' => Carbon::now()->subYears(3),
            'tipo_sangre' => 'DEA 1.1',
            'comportamiento' => 'Tranquilo y amigable',
            'es_adoptado' => true,
        ]);

        // 4. Crear dos consultas
        Consulta::create([
            'mascota_id' => $mascota->id,
            'veterinario_id' => $veterinario->id,
            'fecha_consulta' => Carbon::now()->subDays(15),
            'peso' => 28.5,
            'talla' => 60.0,
            'diagnostico' => 'Chequeo general de rutina. Presenta leve gingivitis.',
            'tratamiento' => 'Limpieza dental recomendada en los próximos 6 meses. Se prescribe enjuague bucal.',
        ]);

        Consulta::create([
            'mascota_id' => $mascota->id,
            'veterinario_id' => $veterinario->id,
            'fecha_consulta' => Carbon::now(),
            'peso' => 29.0,
            'talla' => 60.0,
            'diagnostico' => 'Regresa para su primera limpieza dental.',
            'tratamiento' => 'Limpieza dental realizada bajo anestesia general sin complicaciones.',
        ]);
    }
}
