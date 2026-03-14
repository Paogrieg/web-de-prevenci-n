<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;
use App\Models\Contacts;
class ContactsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('contacts')->insert([
            'name' => 'María López',
            'email' => 'marialopez@gmail.com',
            'message' => 'Quisiera recibir información sobre los talleres de apoyo para mujeres que ofrecen en su organización.',
            'status' => 'new',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        DB::table('contacts')->insert([
            'name' => 'Ana Rodríguez',
            'email' => 'anarodriguez@gmail.com',
            'message' => 'Necesito orientación sobre cómo denunciar un caso de violencia psicológica. ¿Podrían ayudarme?',
            'status' => 'answered',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);
        $table = new Contact();
        $table->name = 'Ana';
        $table->email = 'ana@gmail.com';
        $table->message = 'Necesito ayuda';
        $table->status = 'new';
        $table->save();

        $table = new Contact();
        $table->name = 'Luisa';
        $table->email = 'luisa@gmail.com';
        $table->message = 'Informacion legal';
        $table->status = 'answered';
        $table->save();
    }
}
