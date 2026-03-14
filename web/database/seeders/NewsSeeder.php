<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('news')->insert([
            'title' => 'Chihuahua refuerza protocolo de atención a víctimas',
            'content' => 'Autoridades estatales anunciaron nuevas medidas para mejorar la atención a mujeres víctimas de violencia, incluyendo mayor capacitación para personal de seguridad y apoyo psicológico gratuito.',
            'img' => 'default6.jpg',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('news')->insert([
            'title' => 'Campaña #NoEstasSola impulsa apoyo a mujeres',
            'content' => 'Organizaciones civiles lanzaron la campaña #NoEstasSola para fomentar la denuncia y brindar acompañamiento a mujeres que enfrentan situaciones de violencia en diferentes estados del país.',
            'img' => 'default.jpg',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
         $table = new News();
        $table->title = 'Nueva campaña';
        $table->content = 'Apoyo a mujeres';
        $table->img = 'default.jpg';
        $table->user_id = 1;
        $table->save();

        $table = new News();
        $table->title = 'Nuevo refugio';
        $table->content = 'Refugio abierto';
        $table->img = 'default.jpg';
        $table->user_id = 1;
        $table->save();
    }
}
