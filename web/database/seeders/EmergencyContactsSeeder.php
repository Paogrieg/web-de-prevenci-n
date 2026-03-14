<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\EmergencyContact;
use Illuminate\Support\Facades\DB;
use App\Models\EmergencyContacts;


class EmergencyContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('emergencyContacts')->insert([
            'name' => 'Rosa',
            'lastname'=> 'Martínez',
            'phone_number' => '6365551234',
            'relation' => 'Madre',
            'user_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('emergencyContacts')->insert([
            'name' => 'Carlos',
            'lastname'=> 'Hernández',
            'phone_number' => '6365559876',
            'relation' => 'Hermano',
            'user_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
