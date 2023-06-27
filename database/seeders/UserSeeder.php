<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        //Admin
        $user=User::create([
            'name'=>'Angel Rosendo Condori Coaquira',
            'email'=>'angel.condori@gmail.com',
            'password'=>bcrypt('12345678'),
            'document'=>'40728626',
            'cellphone'=>'950062125',
            'address'=>'Jr. Huancas 370'
        ]);
        $user->assignRole('Administrador');

        //Vendedor
        $user=User::create([
            'name'=>'Juan Perez Perez',
            'email'=>'juan@gmail.com',
            'password'=>bcrypt('12345678'),
            'document'=>'12345678',
            'cellphone'=>'78543445',
            'address'=>'Jr. Moquegua 125'
        ]);
        $user->assignRole('Vendedor');
        //Clientes
        $users=User::factory(5)->create();
        foreach ($users as $user) {
            $user->assignRole('Cliente');
        }
    }
}
