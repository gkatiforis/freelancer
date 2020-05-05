<?php

use Illuminate\Database\Seeder;

class SkillCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('skill_categories')->insert([
            'sign' => 'Ανάπτυξη Λογισμικού και υπηρεσίες Πληροφορικής',
        ]);

        DB::table('skill_categories')->insert([
            'sign' => 'Σχεδιασμός, Τέχνη και Πολυμέσα',
        ]);

        DB::table('skill_categories')->insert([
            'sign' => 'Συγγραφή και μετάφραση',
        ]);

        DB::table('skill_categories')->insert([
            'sign' => 'Εισαγωγή Δεδομένων & Διαχείριση',
        ]);
    }
}
