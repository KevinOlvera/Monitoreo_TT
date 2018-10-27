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
            'user' => '2018000000',
            'name' => 'admin',
            'email' => 'admin@seguimientott.com',
            'password' => bcrypt('admin'),
            'type' => 'admin'
      ]);
      /*
      DB::table('users')->insert([
            'name' => 'Kevin Olvera',
            'email' => 'kevin@seguimientott.com',
            'password' => bcrypt('kevin')
      ]);
      DB::table('users')->insert([
            'name' => 'Alexis Alameda',
            'email' => 'alexis@seguimientott.com',
            'password' => bcrypt('alexis')
      ]);
      DB::table('users')->insert([
            'name' => 'Ivan Olvera',
            'email' => 'ivan@seguimientott.com',
            'password' => bcrypt('ivan'),
            'type' => 'synodal'
      ]);
      DB::table('users')->insert([
            'name' => 'Jesus Olvera',
            'email' => 'jesus@seguimientott.com',
            'password' => bcrypt('jesus'),
            'type' => 'synodal'
      ]);
      */
    }
}
