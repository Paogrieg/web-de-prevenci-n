<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use App\Models\Companies;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            'name' => 'Equoria',
            'description' => 'Organización dedicada a la prevención de la violencia contra las mujeres y a brindar apoyo psicológico y legal.',
            'logo' => 'equoria_logo.png',
            'email' => 'contacto@equoria.org',
            'phone_number' => '6361234589',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('companies')->insert([
            'name' => 'Centro de Apoyo Mujer Segura',
            'description' => 'Institución enfocada en ofrecer refugio, orientación legal y atención psicológica a mujeres en situación de violencia.',
            'logo' => 'mujer_segura_logo.png',
            'email' => 'info@mujersegura.org',
            'phone_number' => '6369874521',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
