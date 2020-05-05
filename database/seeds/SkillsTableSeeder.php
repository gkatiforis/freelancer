<?php

use Illuminate\Database\Seeder;

class SkillsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ανάπτυξη Λογισμικού και υπηρεσίες Πληροφορικής
        DB::table('skills')->insert(array(
            ['sign' => 'Java', 'skill_category_id' => 1],
            ['sign' => 'C++', 'skill_category_id' => 1],
            ['sign' => 'MySQL', 'skill_category_id' => 1],
            ['sign' => 'AJAX,', 'skill_category_id' => 1],
            ['sign' => 'ASP.NET', 'skill_category_id' => 1],
            ['sign' => 'C', 'skill_category_id' => 1],
            ['sign' => 'C#', 'skill_category_id' => 1],
            ['sign' => 'Ασφάλεια Υπολογιστών', 'skill_category_id' => 1],
            ['sign' => 'Διαχείριση Βάσεων Δεδομένων', 'skill_category_id' => 1],
            ['sign' => 'Βάσεις Δεδομένων', 'skill_category_id' => 1],
            ['sign' => 'Drupal', 'skill_category_id' => 1],
            ['sign' => 'Ηλεκτρονικό εμπόριο', 'skill_category_id' => 1],
            ['sign' => 'HTML', 'skill_category_id' => 1],
            ['sign' => 'HTML5', 'skill_category_id' => 1],
            ['sign' => 'J2EE', 'skill_category_id' => 1],
            ['sign' => 'Javascript', 'skill_category_id' => 1],
            ['sign' => 'Joomla', 'skill_category_id' => 1],
            ['sign' => 'jQuery', 'skill_category_id' => 1],
            ['sign' => 'JSP', 'skill_category_id' => 1],
            ['sign' => 'Linux', 'skill_category_id' => 1],
            ['sign' => 'Mac OS', 'skill_category_id' => 1],
            ['sign' => 'Microsoft', 'skill_category_id' => 1],
            ['sign' => 'MariaDB', 'skill_category_id' => 1],
            ['sign' => 'Git', 'skill_category_id' => 1],
            ['sign' => 'CakePHP', 'skill_category_id' => 1],
            ['sign' => 'Cisco', 'skill_category_id' => 1],
            ['sign' => 'Γραφικά Υπολογιστή', 'skill_category_id' => 1],
            ['sign' => 'Delphi', 'skill_category_id' => 1],
            ['sign' => 'Laravel', 'skill_category_id' => 1],
            ['sign' => 'Objective C', 'skill_category_id' => 1],
            ['sign' => 'OpenGL', 'skill_category_id' => 1],
            ['sign' => 'Oracle', 'skill_category_id' => 1],
            ['sign' => 'jQuery', 'skill_category_id' => 1],
            ['sign' => 'Paypal API', 'skill_category_id' => 1],
            ['sign' => 'Perl', 'skill_category_id' => 1],
            ['sign' => 'PHP', 'skill_category_id' => 1],
            ['sign' => 'Pinterest', 'skill_category_id' => 1],
            ['sign' => 'Prolog', 'skill_category_id' => 1],
            ['sign' => 'Python', 'skill_category_id' => 1],
            ['sign' => 'Ruby', 'skill_category_id' => 1],
            ['sign' => 'Αρχιτεκτονική Λογισμικού', 'skill_category_id' => 1],
            ['sign' => 'Eργαλεία μέσων Κοινωνικής Δικτύωσης', 'skill_category_id' => 1],
            ['sign' => 'Δοκιμή Λογισμικού', 'skill_category_id' => 1],
            ['sign' => 'SQL', 'skill_category_id' => 1],
            ['sign' => 'SQLite', 'skill_category_id' => 1],
            ['sign' => 'Διαχείριση Συστήματος', 'skill_category_id' => 1],
            ['sign' => 'Ubuntu', 'skill_category_id' => 1],
            ['sign' => 'Unity 3D', 'skill_category_id' => 1],
            ['sign' => 'UNIX', 'skill_category_id' => 1],
            ['sign' => 'Διεπαφή Χρήστη', 'skill_category_id' => 1],
            ['sign' => 'VB.NET', 'skill_category_id' => 1],
            ['sign' => 'Visual Basic', 'skill_category_id' => 1],
            ['sign' => 'Φιλοξενία Ιστοσελίδων', 'skill_category_id' => 1],
            ['sign' => 'Ασφάλεια Ιστού', 'skill_category_id' => 1],
            ['sign' => 'Διαχείριση Ιστοσελίδων', 'skill_category_id' => 1],
            ['sign' => 'Έλεγχος Ιστοσελίδων', 'skill_category_id' => 1],
            ['sign' => 'XML', 'skill_category_id' => 1],
            ['sign' => 'Windows API', 'skill_category_id' => 1],
            ['sign' => 'Windows Server', 'skill_category_id' => 1],
            ['sign' => 'Wordpress', 'skill_category_id' => 1],
            ['sign' => 'Xquery', 'skill_category_id' => 1],
            ['sign' => 'XSLT', 'skill_category_id' => 1],
            ['sign' => 'Android', 'skill_category_id' => 1],
            ['sign' => 'iPhone', 'skill_category_id' => 1],
            ['sign' => 'Yii', 'skill_category_id' => 1],
            ['sign' => 'Σχεδιασμός Ιστοσελίδας', 'skill_category_id' => 1]

            ));



        //Σχεδιασμός, Τέχνη και Πολυμέσα
        DB::table('skills')->insert(array(
            ['sign' => 'Σχεδιασμός Διαφήμισης','skill_category_id' => 2 ],
            ['sign' => 'Επαγγελματικές Κάρτες','skill_category_id' => 2 ],
            ['sign' => 'Κινούμενα Σχέδια 3D','skill_category_id' => 2 ],
            ['sign' => 'Μοντελοποίηση 3D','skill_category_id' => 2 ],
            ['sign' => 'After Effects','skill_category_id' => 2 ],
            ['sign' => 'Σχεδιασμός Μπροσούρας','skill_category_id' => 2 ],
            ['sign' => 'Εξώφυλλα & Συσκευασία','skill_category_id' => 2 ],
            ['sign' => 'Σχεδιασμός Φυλλαδίου','skill_category_id' => 2 ],
            ['sign' => 'Σχεδιασμός Γραφικών','skill_category_id' => 2 ],
            ['sign' => 'Εικονογράφος','skill_category_id' => 2 ],
            ['sign' => 'Σχεδιασμός Λογοτύπου','skill_category_id' => 2 ],
            ['sign' => 'Επεξεργασία Φωτογραφίας','skill_category_id' => 2 ],
            ['sign' => 'Photoshop','skill_category_id' => 2 ],
            ['sign' => 'PSD σε HTML','skill_category_id' => 2 ],
            ['sign' => 'Παραγωγή Βίντεο','skill_category_id' => 2 ],
            ['sign' => 'Επεξεργασία Βίντεο','skill_category_id' => 2 ],
            ['sign' => 'Photoshop','skill_category_id' => 2 ]));



        //Συγγραφή και μετάφραση
        DB::table('skills')->insert(array(
            ['sign' => 'Ακαδημαϊκή Συγγραφή', 'skill_category_id' => 3 ],
            ['sign' => 'Τεχνική Συγγραφή', 'skill_category_id' => 3 ],
            ['sign' => 'Άρθρα', 'skill_category_id' => 3 ],
            ['sign' => 'Μετάφραση', 'skill_category_id' => 3 ],
            ['sign' => 'Συγγραφή Βιβλίων', 'skill_category_id' => 3 ],
            ['sign' => 'Συγγραφή Περιεχομένου', 'skill_category_id' => 3 ],
            ['sign' => 'Copywriting', 'skill_category_id' => 3 ],
            ['sign' => 'Δημιουργική Συγγραφή', 'skill_category_id' => 3 ],
            ['sign' => 'Ghostwriting', 'skill_category_id' => 3 ],
            ['sign' => 'Powerpoint', 'skill_category_id' => 3 ],
            ['sign' => 'PDF', 'skill_category_id' => 3 ],
            ['sign' => 'Έρευνα', 'skill_category_id' => 3 ],
            ['sign' => 'Επεξεργασία Κειμένο', 'skill_category_id' => 3 ]));




        //Εισαγωγή Δεδομένων & Διαχείριση
        DB::table('skills')->insert(array(
            ['sign' => 'Εισαγωγή Δεδομένων','skill_category_id' => 4],
            ['sign' => 'Επεξεργασία Δεδομένων','skill_category_id' => 4],
            ['sign' => 'Διαδικτυακή Αναζήτηση','skill_category_id' => 4],
            ['sign' => 'Microsoft Office','skill_category_id' => 4],
            ['sign' => 'Microsoft Outlook','skill_category_id' => 4],
            ['sign' => 'Εισαγωγή Δεδομένων','skill_category_id' => 4],
            ['sign' => 'Excel','skill_category_id' => 4]));


    }
}
