<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Verification;
use Illuminate\Support\Facades\DB;
use App\Models\Verifications;
class VerificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('verification')->insert([
            [
                'state' => 'pendiente',
                'date_verification' => '2026-03-13',
                'new_id' => 1,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        DB::table('verification')->insert([
            [
                'state' => 'aprobada',
                'date_verification' => '2026-03-12',
                'new_id' => 2,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ]);
        $table = new Verification();
        $table->state = 'pendiente';
        $table->date_verification = '2026-03-05';
        $table->new_id = 1;
        $table->save();

        $table = new Verification();
        $table->state = 'aprobada';
        $table->date_verification = '2026-03-06';
        $table->new_id = 2;
        $table->save();
    }
}
