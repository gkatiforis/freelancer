<?php

use Illuminate\Database\Seeder;

class ProjectDurationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_duration')->insert(array(
            ['duration' => '1 ημέρα'],
            ['duration' => '1 εώς 3 ημέρες'],
            ['duration' => '1 εβδομάδα'],
            ['duration' => '2 εβδομάδες'],
            ['duration' => '3 εβδομάδες'],
            ['duration' => '1 μήνα'],
            ['duration' => 'Περισσότερο από μήνα'],
            ['duration' => 'Μόνιμη δουλειά']
        ));

    }
}
