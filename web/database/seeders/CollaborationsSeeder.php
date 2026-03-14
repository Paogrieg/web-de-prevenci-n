<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Collaboration;
use Illuminate\Support\Facades\DB;
use App\Models\Colaborations;


class CollaborationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('collaborations')->insert([
            'type' => 'Voluntariado',
            'description' => 'Apoyo en talleres de prevención de violencia de género y acompañamiento a mujeres en situación de riesgo.',
            'user_id' => 1,
            'company_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('collaborations')->insert([
            'type' => 'Donación',
            'description' => 'Donación de recursos para programas de apoyo psicológico y asesoría legal para mujeres.',
            'user_id' => 2,
            'company_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
