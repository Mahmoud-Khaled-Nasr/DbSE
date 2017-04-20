<?php

use Illuminate\Database\Seeder;
use App\School;
class SchoolsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++) {
            $table = new School();
            $table->name = str_random(10);
            $table->location = str_random(50);
            $table->website = str_random(10);
            $table->facebook_page = str_random(10);
            $table->contacts = str_random(10);
            $table->fees = rand(100, 900) / 100;
            $table->description = str_random(10);
            $table->others = str_random(50);
            $table->classification = str_random(10);
            $table->logo = str_random(10);
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;

            $table->save();
        }
    }
}
