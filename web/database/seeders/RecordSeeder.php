<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;
use Illuminate\Support\Facades\DB;
use App\Models\Records;
class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('record')->insert([
            'action' => 'Creación de denuncia',
            'description' => 'La usuaria registró una nueva denuncia por violencia psicológica en la plataforma.',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('record')->insert([
            'action' => 'Actualización de perfil',
            'description' => 'La usuaria actualizó su información personal y agregó un contacto de emergencia.',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
