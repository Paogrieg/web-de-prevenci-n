<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EvidenceFile;
use Illuminate\Support\Facades\DB;
use App\Models\EvidenceFiles;

class EvidenceFilesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('evidenceFiles')->insert([
            'rute' => 'default4.jpg',
            'description' => 'Fotografía tomada en el lugar de los hechos donde se observa el daño causado.',
            'evidences_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('evidenceFiles')->insert([
            'rute' => 'default5.png',
            'description' => 'Captura de pantalla de mensajes enviados por el agresor a través de redes sociales.',
            'evidences_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        //Modelos
        $table = new EvidenceFile();
        $table->rute = 'img1.jpg';
        $table->description = 'Foto evidencia';
        $table->evidences_id = 1;
        $table->save();

        $table = new EvidenceFile();
        $table->rute = 'img2.jpg';
        $table->description = 'Foto evidencia';
        $table->evidences_id = 2;
        $table->save();
        
    }
}
