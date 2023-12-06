<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Destinatarios;

class DestinatariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Destinatarios::create([
            'id' => 1,
            'nombre' => 'Alexander',
            'cargo' => 'Manejador'
        ]);
        Destinatarios::create([
            'id' => 2,
            'nombre' => 'Pedro',
            'cargo' => 'Fiscal'
        ]);
        Destinatarios::create([
            'id' => 3,
            'nombre' => 'Juan',
            'cargo' => 'Contador'
        ]);
    }
}
