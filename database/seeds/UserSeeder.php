<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'pegawai',
            'user_role' => 'Pegawai',
            'username' => 'adminpegawai',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('qwerty'),
        ]);
    }
}
