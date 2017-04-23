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
        /*for ($i=0;$i<20;$i++){
            $table=new University();
            $table->name= str_random(10);
            $table->city= str_random(10);
            $table->type= str_random(10);
            $table->president_name= str_random(30);
            $table->past_presidents= str_random(255);
            $table->website_url= str_random(255);
            $table->facebook_page= str_random(255);
            $table->contacts= str_random(30);
            $table->description= str_random(255);
            $table->logo= str_random(20);
            $table->pic1= str_random(20);
            $table->pic2= str_random(20);
            $table->pic3= str_random(20);
            $table->pic4= str_random(20);
            $table->pic5= str_random(20);
            $table->location= str_random(50);
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->rank=str_random(20);
            $table->others=str_random(100);
            $table->save();
        }*/
        $faker=Faker\Factory::create();

        for ($i=0;$i<15;$i++){
            $table=new University();
            $city=$faker->unique()->city;
            $table->name= $city.' university';
            $table->city= $city;
            $table->type= rand(0,1)?'public':'private';
            $temp=rand(3,9);
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
            $table->logo= str_random(20);
            $table->pic1= str_random(20);
            $table->pic2= str_random(20);
            $table->pic3= str_random(20);
            $table->pic4= str_random(20);
            $table->pic5= str_random(20);
            $table->location= $faker->address;
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->rank=$faker->unique()->numberBetween(10,500);
            $table->others=str_random(100);
            $table->save();
        }
    }
}
