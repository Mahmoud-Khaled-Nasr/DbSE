<?php

use Illuminate\Database\Seeder;
use App\Institute;

class InstituteTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0;$i<100;$i++) {
            $table = new Institute();
            $table->name = str_random(10);
            $table->fees = rand(100, 900) / 100;
            $table->website = str_random(10);
            $table->facebook_page = str_random(10);
            $table->contacts = str_random(10);
            $table->description = str_random(10);
            $table->city=str_random(10);
            $table->departments = str_random(10);
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;
            $table->location=str_random(50);
            $table->others=str_random(50);

            $table->save();
        }
    }
}
