<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SeguimientoCaso;
use Illuminate\Support\Facades\DB;
use App\Models\SeguimientoCasos;
class SeguimientoCasosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('seguimientoCasos')->insert([
            [
                'status' => 'in_process',
                'coments' => 'El caso se está revisando, se contactará al usuario pronto.',
                'complaint_id' => 1,
                'testimonial_id' => 1,
                'advisor_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
         ]);
          DB::table('seguimientoCasos')->insert([
            [
                'status' => 'open',
                'coments' => 'Se ha abierto el caso y se asignó un asesor para seguimiento.',
                'complaint_id' => 2,
                'testimonial_id' => 2,
                'advisor_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
