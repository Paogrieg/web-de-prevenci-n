<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Law;
use Illuminate\Support\Facades\DB;

class LawsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('laws')->insert([
            'title'       => 'Ley General de Acceso de las Mujeres a una Vida Libre de Violencia',
            'description' => 'Ley que establece los mecanismos para prevenir, sancionar y erradicar la violencia contra las mujeres en México.',
            'state'       => 'Federal',
            'url'         => 'https://www.diputados.gob.mx/LeyesBiblio/pdf/LGAMVLV.pdf',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        DB::table('laws')->insert([
            'title'       => 'Ley Estatal del Derecho de las Mujeres a una Vida Libre de Violencia',
            'description' => 'Normativa del estado de Chihuahua que protege a las mujeres contra cualquier tipo de violencia y promueve la igualdad.',
            'state'       => 'Chihuahua',
            'url'         => 'https://www.congresochihuahua2.gob.mx/biblioteca/leyes/archivosLeyes/1050.pdf',
            'created_at'  => date('Y-m-d H:i:s'),
            'updated_at'  => date('Y-m-d H:i:s'),
        ]);

        // Modelos
        $table = new Law();
        $table->title       = 'NOM-046-SSA2-2005: Violencia Familiar, Sexual y Género';
        $table->description = 'Norma Oficial Mexicana que establece los criterios para la detección, prevención, atención médica y la orientación a las personas que se encuentren involucradas en situaciones de violencia familiar o sexual.';
        $table->state       = 'Federal';
        $table->url         = 'https://www.dof.gob.mx/normasOficiales/3623/salud16_C/salud16_C.htm';
        $table->save();

        $table = new Law();
        $table->title       = 'Código Penal Federal — Art. 325 (Feminicidio)';
        $table->description = 'Artículo del Código Penal Federal que tipifica el feminicidio como delito y establece las sanciones correspondientes.';
        $table->state       = 'Federal';
        $table->url         = 'https://www.diputados.gob.mx/LeyesBiblio/pdf/CPF.pdf';
        $table->save();
    }
}