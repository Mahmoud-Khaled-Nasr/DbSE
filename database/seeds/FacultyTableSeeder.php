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
            $table->name = str_random(10);
            $table->fees = rand(100, 900) / 100;
            $table->president_name = str_random(10);
            $table->past_presidents = str_random(10);
            $table->website = str_random(10);
            $table->facebook_page = str_random(10);
            $table->contacts = str_random(10);
            $table->description = str_random(10);
            $table->city=str_random(10);
            $table->departments = str_random(10);
            $table->logo = str_random(10);
            $table->pic1 = str_random(10);
            $table->pic2 = str_random(10);
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;
            $table->location=str_random(50);
            $table->others=str_random(50);

            $table->save();
        }
    }
}
