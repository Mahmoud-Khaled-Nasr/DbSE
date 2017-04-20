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
            $table->fees = rand(100, 900) / 100;
            $table->fpresident_name = str_random(10);
            $table->fpast_presidents = str_random(10);
            $table->fwebsite = str_random(10);
            $table->ffacebook_page = str_random(10);
            $table->fcontacts = str_random(10);
            $table->fdescription = str_random(10);
            $table->city=str_random(10);
            $table->departments = str_random(10);
            $table->flogo = str_random(10);
            $table->fpic1 = str_random(10);
            $table->fpic2 = str_random(10);
            $table->fx = rand(100, 900) / 100;
            $table->fy = rand(100, 900) / 100;
            $table->location=str_random(50);
            $table->others=str_random(50);

            $table->save();
        }
    }
}
