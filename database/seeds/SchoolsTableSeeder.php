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
            $table->sname = str_random(10);
            $table->city = str_random(10);
            $table->sowner_name = str_random(10);
            $table->swebsite = str_random(10);
            $table->sfacebook_page = str_random(10);
            $table->scontacts = str_random(10);
            $table->fees = rand(100, 900) / 100;
            $table->description = str_random(10);
            $table->stages = str_random(10);
            $table->classification = str_random(10);
            $table->slogo = str_random(10);
            $table->spic1 = str_random(10);
            $table->spic2 = str_random(10);
            $table->sx = rand(100, 900) / 100;
            $table->sy = rand(100, 900) / 100;

            $table->save();
        }
    }
}
