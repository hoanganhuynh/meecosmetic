<?php

use Illuminate\Database\Seeder;

class typeCooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('users')->insert([
            ['name' => 'Tra Mi', 'email' => 'mi123@gmail.com', 'password'=>bcrypt('mmmmmmmm')],
            ['name' => 'Nguyen Anh', 'email' => 'anh123@gmail.com', 'password'=>bcrypt('mmmmmmmm')]
        ]);
    }
}
