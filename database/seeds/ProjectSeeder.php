<?php

use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('project')->insert(array(
            ['title' => 'Μια android εφρμογή..',
                'description' => 'Είμαι ιδιοκτήτης εστιατορίου για θα ήθελα μια εφαρμογη μέσω της οποίας οι πελάτες θα μπορούσαν να κάνουν μόνοι την παραγγελία τους. Θα μπορώ να τροποποιήσω τους τιμοκατάλογους και θα υπάρχουν προσφορές.',
                'category_id' => 1,
            'user_id' => 1,'project_type' =>  1,
                'status_id' => 1]
        ));

        DB::table('project')->insert(array(
            ['title' => 'Site για ξενοδοχείο',
                'description' => 'Υπαρχει ήδη ενα site σε Joomla. Θέλω κάποιον να μου προσθέσει νέες λειτουγίες και plugins',
                'category_id' => 1,
                'user_id' => 1,'project_type' =>  1,
                'status_id' => 1]
        ));

        DB::table('project')->insert(array(
            ['title' => 'Κατασκευή Icon', 'description' => 'Κατασκευή icon για την εταιρία μου', 'category_id' => 1,
                'user_id' => 1,'project_type' =>  1,'status_id' => 1]
        ));
    }
}
