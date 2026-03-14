<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AdvertisingModel;
use Illuminate\Support\Facades\DB;
use App\Models\Advertising;

class AdvertisingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('advertising')->insert([
        
            'title' => 'Campaña Contra la Violencia',
            'image' => 'default2.jpg',
            'link' => 'default',
            'start_date' => '2026-03-01',
            'end_date' => '2026-04-01',
            'active' => true,
            'company_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('advertising')->insert([
            'title' => 'Apoyo para Mujeres',
            'image' => 'default3.jpg',
            'link' => 'default',
            'start_date' => '2026-03-10',
            'end_date' => '2026-05-10',
            'active' => true,
            'company_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $table = new Advertising();
        $table->title = 'Campaña Contra la Violencia';
        $table->image = 'default2.jpg';
        $table->link = 'default';
        $table->start_date = '2026-03-01';
        $table->end_date = '2026-04-01';
        $table->active = true;
        $table->company_id = 1;
        $table->save();


        $table = new Advertising();
        $table->title = 'Apoyo para Mujeres';
        $table->image = 'default3.jpg';
        $table->link = 'default';
        $table->start_date = '2026-03-10';
        $table->end_date = '2026-05-10';
        $table->active = true;
        $table->company_id = 1;
        $table->save();

    }
}
