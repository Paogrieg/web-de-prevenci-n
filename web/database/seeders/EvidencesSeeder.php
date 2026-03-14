<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Evidence;
use Illuminate\Support\Facades\DB;
class EvidencesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         DB::table('evidences')->insert([
            'file_type' => 'img',
            'complaint_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('evidences')->insert([
            'file_type' => 'document',
            'complaint_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $table = new Evidence();
        $table->file_type = 'img';
        $table->complaint_id = 1;
        $table->save();


        $table = new Evidence();
        $table->file_type = 'record';
        $table->complaint_id = 2;
        $table->save();
    }
}
