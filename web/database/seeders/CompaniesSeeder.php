<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use Illuminate\Support\Facades\DB;


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
        //Insertar datos con modelos
        $table = new Company();
        $table->name = 'Instituto de la Mujer';
        $table->description = 'Apoyo legal y psicologico';
        $table->logo = 'logos/imujer.png';
        $table->email = 'contacto@imujer.com';
        $table->phone_number = '6561111111';
        $table->save();

        $table = new Company();
        $table->name = 'Fiscalia de la Mujer';
        $table->description = 'Atencion a victimas';
        $table->logo = 'logos/fiscalia.png';
        $table->email = 'fiscalia@gmail.com';
        $table->phone_number = '6562222222';
        $table->save();
    }
}
