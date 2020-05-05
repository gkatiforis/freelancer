<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Γιώργος',
            'email' => 'georg93@gmail.com',
            'password' => bcrypt('giorgos'),
            'job_title' => 'Programmer',
            'user_description' => 'Ασχολούμε επαγγελματικά με την C++',
            'user_type_id' => 1,
        ]);

        DB::table('users')->insert([
            'name' => 'Λευτέρης',
            'email' => 'lef93@gmail.com',
            'password' => bcrypt('leuteris'),
            'job_title' => '',
            'user_description' => '',
            'user_type_id' => 1,
        ]);
    }
}
