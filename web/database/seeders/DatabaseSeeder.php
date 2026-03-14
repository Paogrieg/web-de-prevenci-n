<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([AdvisorsSeeder::class]);
        $this->call([LawsSeeder::class]);
        $this->call([CompaniesSeeder::class]);
        $this->call([ContactsSeeder::class]);
        $this->call([AvatarsSeeder::class]);
        $this->call([UsersSeeder::class]);
        $this->call([EmergencyContactsSeeder::class]);
        $this->call([RecordSeeder::class]);
        $this->call([NewsSeeder::class]);
        $this->call([CollaborationsSeeder::class]);
        $this->call([ComplaintsSeeder::class]);
        $this->call([TestimonialsSeeder::class]);
        $this->call([EvidencesSeeder::class]);
        $this->call([EvidenceFilesSeeder::class]);
        $this->call([SeguimientoCasosSeeder::class]);
        $this->call([VerificationsSeeder::class]);
        $this->call([PaymentsSeeder::class]);
        $this->call([AdvertisingSeeder::class]);
    }
}
