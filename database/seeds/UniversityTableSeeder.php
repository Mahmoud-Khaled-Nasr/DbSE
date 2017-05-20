<?php

use Illuminate\Database\Seeder;
use App\University;

class UniversityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();

        for ($i=0;$i<15;$i++){
            $table=new University();
            $city=$faker->unique()->city;
            $table->name= $city.' university';
            $table->city= $city;
            $table->type= rand(0,1)?'public':'private';
            $temp=rand(1,3);
            $names=$faker->name;
            for ($j=0;$j<$temp;$j++){
                $names=$names.'/'.$faker->name;
            }
            $table->president_name= $faker->name;
            $table->past_presidents= $names;
            $table->website_url= $faker->url;
            $table->facebook_page= $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->description= $faker->realText(200);
            $table->logo= "storage/universities/1/logo.jpg";
            $table->pic1= "storage/universities/1/w.jpg";
            $table->pic2= "storage/universities/1/logo.jpg";
            $table->pic3= "storage/universities/1/w.jpg";
            $table->pic4= "storage/universities/1/logo.jpg";
            $table->pic5= "storage/universities/1/w.jpg";
            $table->location= $faker->address;
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->rank=$faker->unique()->numberBetween(10,500);
            $table->others=str_random(100);
            $table->save();
        }
    }
}
