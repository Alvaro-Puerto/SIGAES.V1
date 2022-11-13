<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class Permision extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $pemission = Permission::create([
            'name' => 'Crear alumno'
        ]);

        $pemission = Permission::create([
            'name' => 'Eliminar alumno'
        ]);

        $pemission = Permission::create([
            'name' => 'Editar alumno'
        ]);

        $pemission = Permission::create([
            'name' => 'Listar alumno'
        ]);


        $pemission = Permission::create([
            'name' => 'Crear maestro'
        ]);

        $pemission = Permission::create([
            'name' => 'Eliminar maestro'
        ]);

        $pemission = Permission::create([
            'name' => 'Editar maestro'
        ]);

        $pemission = Permission::create([
            'name' => 'Listar maestro'
        ]);

        $pemission = Permission::create([
            'name' => 'Crear padre de familia'
        ]);

        $pemission = Permission::create([
            'name' => 'Eliminar padre de familia'
        ]);

        $pemission = Permission::create([
            'name' => 'Editar padre de familia'
        ]);

        $pemission = Permission::create([
            'name' => 'Listar padre de familia'
        ]);

        $pemission = Permission::create([
            'name' => 'Asignar padre de familia a alumnos'
        ]);

        $pemission = Permission::create([
            'name' => 'Quitar vinculo con padre de familia'
        ]);

        $pemission = Permission::create([
            'name' => 'Listar ciclo lectivo'
        ]);

        $pemission = Permission::create([
            'name' => 'Crear ciclo lectivo'
        ]);

        $pemission = Permission::create([
            'name' => 'Editar ciclo lectivo'
        ]);

        $pemission = Permission::create([
            'name' => 'Configurar ciclo lectivo'
        ]);

        $pemission = Permission::create([
            'name' => 'Configurar pensum'
        ]);


        $pemission = Permission::create([
            'name' => 'Configurar parciales'
        ]);



    }
}
