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
        $cities=array("cairo","giza","alex","aswan","port said");

        $faker=Faker\Factory::create();
        for ($i=0;$i<20;$i++) {
            $table = new School();
            $table->name = $faker->firstName.' school';
            $table->city=$cities[rand(0,4)];
            $table->location = $faker->address;
            $table->website_url = $faker->url;
            $table->facebook_page = $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->fees = rand(100, 900) / 100;
            $table->description= $faker->realText(200);
            $table->others = str_random(50);
            $table->classification = str_random(10);
            $table->logo = str_random(10);
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;

            $table->save();
        }
    }
}
