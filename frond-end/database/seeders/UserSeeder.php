<?php

namespace Database\Seeders;

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
            'name' => 'admin',
            'email' => 'admin@ehb.be',
            'password' => Hash::make('password!321'),
            'is_admin' => true
        ]);

        DB::table('paper')->insert([
            'title' => Str::random(10),
            'synopsis' => Str::random(50),
            'text' => Str::random(100),
            'user_id' => 1
        ]);

        DB::table('questions')->insert([
            'question' => 'How can i contact the admins',
            'answer' => '',
            'user_id' => 1
        ]);
    }
}
