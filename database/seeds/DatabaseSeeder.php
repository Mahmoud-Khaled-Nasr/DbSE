<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UniversityTableSeeder::class);
        $this->call(FacultyTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(VisitorTableSeeder::class);
        $this->call(SchoolsTableSeeder::class);
        $this->call(InstituteTableSeeder::class);
        $this->call(AcademyTableSeeder::class);
        $this->call(AcadfacultyTableSeeder::class);
    }
}
