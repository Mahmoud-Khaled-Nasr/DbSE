<?php

use Illuminate\Database\Seeder;
use App\Faculty;

class FacultyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++) {
            $table = new Faculty();
            $table->university_id = rand(0,40);
            $table->fname = str_random(10);
            $table->fpresident_name = str_random(10);
            $table->fpast_presidents = str_random(10);
            $table->furl = str_random(10);
            $table->ffb_url = str_random(10);
            $table->fcontacts = str_random(10);
            $table->fdescription = str_random(10);
            $table->departments = str_random(10);
            $table->f_logo = str_random(10);
            $table->fx = rand(100, 900) / 100;
            $table->fy = rand(100, 900) / 100;

            $table->save();
        }
    }
}
