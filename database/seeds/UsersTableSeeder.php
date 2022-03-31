<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'name' => 'Test',
                'apellido_paterno' => 'test',
                'apellido_materno' => 'test',
                'id_ubicacion' => '1',
                'usuario' => 'admin',
                'estatus' => '1',
                'id_rol' => '1',
                'email' => '1@1',
                'email_verified_at' => '2019-05-20 11:18:46',
                'password' => '$2y$10$964LYU0HFf1N.1B/eLcvTuhGwr9JddMI15U68c29dNkhV3WMt./Ii',
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

            1 =>
            array (
                'name' => 'Test1',
                'apellido_paterno' => 'test',
                'apellido_materno' => 'test',
                'id_ubicacion' => '1',
                'usuario' => 'admin1',
                'estatus' => '1',
                'id_rol' => '1',
                'email' => '2@2',
                'email_verified_at' => '2019-05-20 11:18:46',
                'password' => bcrypt('123'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),


            2 =>
            array (
                'name' => 'Test2',
                'apellido_paterno' => 'test2',
                'apellido_materno' => 'test2',
                'id_ubicacion' => '4',
                'usuario' => 'admin2',
                'estatus' => '1',
                'id_rol' => '1',
                'email' => '5@5',
                'email_verified_at' => '2019-05-20 11:18:46',
                'password' => bcrypt('123'),
                'remember_token' => NULL,
                'created_at' => NULL,
                'updated_at' => NULL,
            ),

        ));
    }

}



