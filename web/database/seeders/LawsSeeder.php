<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Law;
use Illuminate\Support\Facades\DB;
use App\Models\Laws;
class LawsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laws')->insert([
            'title' => 'Ley General de Acceso de las Mujeres a una Vida Libre de Violencia',
            'description' => 'Ley que establece los mecanismos para prevenir, sancionar y erradicar la violencia contra las mujeres en México.',
            'state' => 'Federal',
            'url' => 'default',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('laws')->insert([
            'title' => 'Ley Estatal del Derecho de las Mujeres a una Vida Libre de Violencia',
            'description' => 'Normativa del estado de Chihuahua que protege a las mujeres contra cualquier tipo de violencia y promueve la igualdad.',
            'state' => 'Chihuahua',
            'url' => 'default',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        //Modelos
        $table = new Law();
        $table->title = 'Ley contra violencia';
        $table->description = 'Proteccion a la mujer';
        $table->state = 'Chihuahua';
        $table->url = 'default';
        $table->save();

        $table = new Law();
        $table->title = 'Ley de igualdad';
        $table->description = 'Derechos de la mujer';
        $table->state = 'Mexico';
        $table->url = 'default';
        $table->save();
    }
}
