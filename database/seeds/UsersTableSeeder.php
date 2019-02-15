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
            'name' =>  'admin',
            'email' => 'admin@testadminacc.testadminacc',
            'permission' => 3, // admin
            'password' => bcrypt('administrator')
        ]);
        
        DB::table('users')->insert([
            'name' => 'normaluser',
            'email' => 'normaluser@testuseracc.testuseracc',
            'permission' => 0, // normal user
            'password' => bcrypt('normaluser')
        ]);
    }
}
