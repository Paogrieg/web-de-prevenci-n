<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Testimony;
use Illuminate\Support\Facades\DB;
use App\Models\Testimonials;
class TestimonialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('testimonials')->insert([
            [
                'content' => 'Me siento satisfecho con la atención brindada.',
                'anonymous' => false,
                'user_id' => 1, 
                'complaint_id' => 1, 
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        DB::table('testimonials')->insert([
            [
                'content' => 'El seguimiento fue rápido y profesional.',
                'anonymous' => true,
                'user_id' => 2,
                'complaint_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
    }
}
