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
        for ($i=0;$i<20;$i++){
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
            $table->logo= str_random(255);
            $table->pic1= str_random(255);
            $table->pic2= str_random(255);
            $table->pic3= str_random(255);
            $table->pic4= str_random(255);
            $table->pic5= str_random(255);
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->save();
        }
    }
}
