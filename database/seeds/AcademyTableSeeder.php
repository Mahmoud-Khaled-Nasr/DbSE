<?php

use Illuminate\Database\Seeder;
use App\Academy;
class AcademyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Faker\Factory::create();
        for ($i=0;$i<20;$i++){
            $table=new Academy();
            $city=$faker->unique()->city;
            $table->name= $city.' academy';
            $table->city= $city;
            $table->website_url= $faker->url;
            $table->facebook_page= $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->description= $faker->realText(50);
            $table->logo= "storage/academies/1/logo.jpg";
            $table->pic1= "storage/academies/1/w.jpg";
            $table->pic2= str_random(20);
            $table->location= $faker->address;
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->save();
        }
    }
}
