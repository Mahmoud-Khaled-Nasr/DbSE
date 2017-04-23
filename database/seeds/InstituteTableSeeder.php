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
        $faker=Faker\Factory::create();
        for ($i=0;$i<100;$i++) {
            $table = new Institute();
            $city=$faker->city;
            $table->city=$city;
            $table->name = $city.' institute';
            $table->fees = rand(100, 900) / 100;
            $table->website_url = $faker->url;
            $table->facebook_page = $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->description = $faker->realText(200);
            $temp=rand(2,5);
            $names=$faker->jobTitle.' deparment';
            for ($j=0;$j<$temp;$j++){
                $names=$names.'/'.$faker->jobTitle.' deparment';
            }
            $table->departments = $names;
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;
            $table->location=$faker->address;
            $table->others=str_random(50);
            $table->save();
        }
    }
}
