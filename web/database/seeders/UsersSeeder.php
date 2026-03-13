<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //Insertar con el seeder
            DB::table('users')->insert([
            'name' => 'Paola',
            'lastname'=> 'Griego',
            'email' => 'paola.griego@gmail.com',
            'password' => Hash::make('123456'),
            'phone_number' => ('6361346901'),
            'dateBirth' =>'2005-08-17',
            'avatar_id' => 1,
            'rol' => 'user',
            'verificated' => false,
            'created_at' => date('Y-m-d H:i:s'),
        ]);

        //insertar con el modelo 
        $table = new User();
        $table->name = 'Mittsy';
        $table->lastname ='Andazola';
        $table->email = 'mittsyyy@gmail.com';
        $table->password =Hash::make('12345678');
        $table->phone_number = '6521048807';
        $table->dateBirth = '2005-09-05';
        $table->avatar_id = 2;
        $table->rol = 'admin';
        $table->verificated = true;
        $table->save();
        
    }
}
