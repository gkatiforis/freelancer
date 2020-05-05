<?php

use Illuminate\Database\Seeder;

class UserTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users_type')->insert([
        'sign' => 'Διαχειριστής'
        ]);

        DB::table('users_type')->insert([
            'sign' => 'Συντονιστής'
        ]);

        DB::table('users_type')->insert([
            'sign' => 'Eργοδότης'
        ]);

        DB::table('users_type')->insert([
            'sign' => 'Εργαζόμενος'
        ]);
    }
}
