<?php

use Illuminate\Database\Seeder;
use App\Models\Users;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      Users::create(
        [
          'name'    => 'André',
          'sobrenome'    => 'Oliveira Braga',
          'email'   => 'andrebraga@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'admin',
        ]
        );
      Users::create(
        [
          'name'    => 'Georgia',
          'sobrenome'    => 'Souza Gomes Barbosa',
          'email'   => 'georgiabarbosa@email.com',
          'password'=> bcrypt('654321'),
          'tipousuario'=> 'admin',
        ]
        );
      Users::create(
        [
          'name'    => 'Lucas',
          'sobrenome'    => 'Guimarães Pereira',
          'email'   => 'lucasgp@email.com',
          'password'=> bcrypt('987654'),
          'tipousuario'=> 'admin',
        ]
        );
      Users::create(
        [
          'name'    => 'Sueli',
          'sobrenome'    => 'Catarina Isabelle Pinto',
          'email'   => 'suelicatarina@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'name'    => 'Heitor',
          'sobrenome'    => 'Paulo Melo',
          'email'   => 'heitormelo@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'name'    => 'Joana',
          'sobrenome'    => 'Adriana Isabel Moreira',
          'email'   => 'joanamoreira@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'name'    => 'Eduardo',
          'sobrenome'    => 'Emanuel Tomás Caldeira',
          'email'   => 'eduardoemanueltomascaldeira@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'name'    => 'Teresinha',
          'sobrenome'    => 'Mariah Sales',
          'email'   => 'teresinhamariahsales@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
      Users::create(
        [
          'name'    => 'Emanuel',
          'sobrenome'    => 'Luan Nicolas Barros',
          'email'   => 'emanuelluan@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'distribuidor',
        ]
        );
      Users::create(
        [
          'name'    => 'Letícia',
          'sobrenome'    => 'Alessandra Gonçalves',
          'email'   => 'leticiagoncalves@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'distribuidor',
        ]
        );

    }
}
