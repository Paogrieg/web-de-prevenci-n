<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Adviser;
use Illuminate\Support\Facades\DB;
use App\Models\Advisors;

class AdvisorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advisors')->insert([
            'name' => 'Laura',
            'lastname'=> 'Martínez',
            'email' => 'laura.martinez@gmail.com',
            'phone_number' => '6361234567',
            'specialty' => 'Psicología',
            'institution' => 'Centro de Atención a la Mujer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('advisors')->insert([
            'name' => 'Daniela',
            'lastname'=> 'Ramírez',
            'email' => 'daniela.ramirez@gmail.com',
            'phone_number' => '6369876543',
            'specialty' => 'Trabajo Social',
            'institution' => 'Instituto Chihuahuense de la Mujer',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
