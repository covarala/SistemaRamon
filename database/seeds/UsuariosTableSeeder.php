<?php


use Illuminate\Database\Seeder;
use App\Models\Users;


class UsuariosTableSeeder extends Seeder
{

    public function run()

    {
        Users::create(
          [
            'name'    => 'André Braga',
        	  'email'   => 'andrebraga@email.com',
            'password'=> bcrypt('123456'),
            'tipoUsuario'=> 'cliente',
          ]
          );

}
}
