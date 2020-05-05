<?php

use Illuminate\Database\Seeder;

class ProjectTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_type')->insert(array(
            ['type' => 'Με την ώρα'],
            ['type' => 'Καθορισμένη τιμή']

        ));
    }
}
