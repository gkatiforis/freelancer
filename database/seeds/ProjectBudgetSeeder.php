<?php

use Illuminate\Database\Seeder;

class ProjectBudgetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('project_budget')->insert(array(
            ['budget' => '1 εώς 50 €'],
            ['budget' => '51 εώς 150 €'],
            ['budget' => '151 εώς 300 €'],
            ['budget' => '301 εώς 500 €'],
            ['budget' => '500 εώς 1000 €'],
            ['budget' => '1000+€']
        ));
    }
}
