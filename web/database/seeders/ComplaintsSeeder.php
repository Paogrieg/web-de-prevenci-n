<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Complaint;
use Illuminate\Support\Facades\DB;
use App\Models\Complaints;

class ComplaintsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('complaints')->insert([
            'title' => 'Agresión física en vía pública',
            'description' => 'Se reporta una agresión física hacia una mujer ocurrida cerca de una parada de autobús. Vecinos del lugar solicitaron apoyo.',
            'type' => 'Física',
            'status' => 'pendiente',
            'lat' => 28.6353,
            'lng' => -106.0889,
            'date' => '2026-03-12',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('complaints')->insert([
            'title' => 'Acoso digital en redes sociales',
            'description' => 'La víctima reporta recibir mensajes ofensivos y amenazas a través de redes sociales por parte de su expareja.',
            'type' => 'Digital',
            'status' => 'revision',
            'lat' => 31.6904,
            'lng' => -106.4245,
            'date' => '2026-03-11',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        //Modelos
        $table = new Complaint();
        $table->title = 'Violencia familiar';
        $table->description = 'Problemas en casa';
        $table->type = 'violencia';
        $table->status = 'pendiente';
        $table->lat = 31.690;
        $table->lng = -106.424;
        $table->date = '2026-03-01';
        $table->user_id = 1;
        $table->save();

        $table = new Complaint();
        $table->title = 'Acoso laboral';
        $table->description = 'Problemas en el trabajo';
        $table->type = 'acoso';
        $table->status = 'revision';
        $table->lat = 31.700;
        $table->lng = -106.420;
        $table->date = '2026-03-02';
        $table->user_id = 1;
        $table->save();
    }
}
