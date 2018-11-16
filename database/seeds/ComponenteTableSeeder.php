<?php

use App\Componente;
use Illuminate\Database\Seeder;

class ComponenteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $componentes = [
            // perfil
            array('nombre' => 'indice perfiles', 'modulo_id' => 1),
            array('nombre' => 'ver perfil', 'modulo_id' => 1),
            array('nombre' => 'crear perfil', 'modulo_id' => 1),
            array('nombre' => 'editar perfil', 'modulo_id' => 1),
            array('nombre' => 'eliminar perfil', 'modulo_id' => 1),
        	// usuario
            array('nombre' => 'indice usuarios', 'modulo_id' => 1),
            array('nombre' => 'ver usuario', 'modulo_id' => 1),
            array('nombre' => 'crear usuario', 'modulo_id' => 1),
            array('nombre' => 'editar usuario', 'modulo_id' => 1),
            array('nombre' => 'eliminar usuario', 'modulo_id' => 1),
        	// empleado
            array('nombre' => 'indice empleados', 'modulo_id' => 2),
            array('nombre' => 'ver empleado', 'modulo_id' => 2),
            array('nombre' => 'crear empleado', 'modulo_id' => 2),
            array('nombre' => 'editar empleado', 'modulo_id' => 2),
            // clientes
            array('nombre' => 'indice clientes', 'modulo_id' => 3),
            array('nombre' => 'ver cliente', 'modulo_id' => 3),
            array('nombre' => 'crear cliente', 'modulo_id' => 3),
            array('nombre' => 'editar cliente', 'modulo_id' => 3),
        ];
        Componente::insert($componentes);
    }
}
