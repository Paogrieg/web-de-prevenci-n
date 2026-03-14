<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Pay;
use Illuminate\Support\Facades\DB;
use App\Models\Payments;
class PaymentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payments')->insert([
            'cost' => 1800.00,
            'payment_method' => 'Mastercard',
            'payment_reference' => 'VER-415646',
            'status' => 'completed',
            'payment_date' => '2026-03-01',
            'verification_id' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('payments')->insert([
            'cost' => 2500.00,
            'payment_method' => 'Transferencia',
            'payment_reference' => 'VER-126749',
            'status' => 'in_process',
            'payment_date' => '2026-03-10',
            'verification_id' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
    }
}
