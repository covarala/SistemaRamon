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
          'name'    => 'André Braga',
          'email'   => 'andrebraga@email.com',
          'password'=> bcrypt('123456'),
          'tipousuario'=> 'cliente',
        ]
        );
        // $this->call(UsersTableSeeder::class);
    }
}
