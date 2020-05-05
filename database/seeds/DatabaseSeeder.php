<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(UserTypesTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(SkillCategoriesTableSeeder::class);
        $this->call(SkillsTableSeeder::class);

        $this->call(ProjectStatusTableSeeder::class);
        $this->call(ProjectDurationSeeder::class);
        $this->call(ProjectBudgetSeeder::class);
        $this->call(ProjectTypeSeeder::class);
        $this->call(ProjectSeeder::class);
        Model::reguard();
    }
}
