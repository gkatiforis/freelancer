<?php

use Illuminate\Database\Seeder;

class ProjectStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_status')->insert(array(
            ['status_sign' => 'Ανοιχτό'],
            ['status_sign' => 'Σε αναμονή'],
            ['status_sign' => 'Σε εξέλιξη'],
            ['status_sign' => 'Κλειστό']

        ));
    }
}
