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
            DB::table('users')->insert([
                'name' => 'Usuario Uno',
                'email' => 'usuariouno@email.tld',
                'password' => bcrypt('123456'),
            ]);

            DB::table('users')->insert([
                'name' => 'Usuario Dos',
                'email' => 'usuariodos@email.tld',
                'password' => bcrypt('123456'),
            ]);
    }
}
