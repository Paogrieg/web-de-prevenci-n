<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Avatar;

class AvatarsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //insertar con seeder
         DB::table('avatars')->insert([
            'rute' => 'default.png',
        ]);
          DB::table('avatars')->insert([
            'rute' => 'default1.png',
        ]);
        //insertar con el modelo 
        $table = new Avatar();
        $table->rute = 'default.png';
        $table->save();
         //insertar con el modelo 
        $table = new Avatar();
        $table->rute = 'default3.png';
        $table->save();

        $table = new Avatar();
        $table->rute = 'default4.png';
        $table->save();
    }
}
