<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         //crear usuario de prueba cada que se ejecuten migraciones
        User::factory()->create([
            'name' => 'joel andrade',
            'email' => 'fer@gmail.com',
            'password' => bcrypt('12345678'),
            'id_number' => '12345678',
            'phone' => '11111',
            'address' => 'Calle 121',

        ])->assignRole('Doctor');
         if($user) {
            echo "Usuario de prueba creado exitosamente\n";
        }

        
    }
}