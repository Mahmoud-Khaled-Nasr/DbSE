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
        $faker=Faker\Factory::create();
        for ($i=0;$i<100;$i++) {
            $table = new Faculty();
            $table->university_id = rand(1,15);
            $table->name = 'Faculty of '.$faker->jobTitle;
            $table->fees = rand(100, 900) / 100;
            $table->president_name = $faker->name;
            $temp=rand(3,9);
            $names=$faker->name;
            for ($j=0;$j<$temp;$j++){
                $names=$names.'/'.$faker->name;
            }
            $table->past_presidents = $names;
            $table->website_url= $faker->url;
            $table->facebook_page= $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->description= $faker->realText(200);
            $table->city=$faker->city;
            $temp=rand(1,3);
            $names=$faker->jobTitle.' deparment';
            for ($j=0;$j<$temp;$j++){
                $names=$names.'/'.$faker->jobTitle.' deparment';
            }
            $table->departments = $names;
            $table->logo = str_random(10);
            $table->pic1 = str_random(10);
            $table->pic2 = str_random(10);
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;
            $table->location=$faker->address;
            $table->others=str_random(50);

            $table->save();
        }
    }
}
