<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        User::create([
            'id_usuario'        => 1,
            'name'              => 'Darwin',
            'apellido'          => 'Torrez',
            'email'             => 'darwincarballo82@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('blade15'), // Cambia a una contraseña segura
            'cedula'            => '000-000000-0000X',        // Ajusta este valor
            'tipousuario'       => 'admin',                   // Ajusta según tu sistema
            'estado'            => 'activo',
            'direccion'         => 'Dirección de ejemplo',
            'telefono'          => '82102295',
            'remember_token'    => Str::random(10),
            'created_at'        => now(),
            'updated_at'        => now(),
        ]);
    }
}
