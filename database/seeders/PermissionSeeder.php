<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{
        //Dashboard
        Permission::create([
            'name'=>'Ver dashboard'
        ]);
        //Clientes
        Permission::create([
            'name'=>'Listar clientes'
        ]);
        Permission::create([
            'name'=>'Crear clientes'
        ]);
        Permission::create([
            'name'=>'Editar clientes'
        ]);
        Permission::create([
            'name'=>'Eliminar clientes'
        ]);
        //Categorias
        Permission::create([
            'name'=>'Listar categorias'
        ]);
        Permission::create([
            'name'=>'Crear categorias'
        ]);
        Permission::create([
            'name'=>'Editar categorias'
        ]);
        Permission::create([
            'name'=>'Eliminar categorias'
        ]);
        //Productos
        Permission::create([
            'name'=>'Listar productos'
        ]);
        Permission::create([
            'name'=>'Crear productos'
        ]);
        Permission::create([
            'name'=>'Editar productos'
        ]);
        Permission::create([
            'name'=>'Eliminar productos'
        ]);

    }
}
