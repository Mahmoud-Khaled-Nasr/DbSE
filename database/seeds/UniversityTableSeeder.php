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
            $temp=new University();
            $temp->name= str_random(40);
            $temp->president_name= str_random(30);
            $temp->past_presidents= str_random(255);
            $temp->url= str_random(255);
            $temp->fb_url= str_random(255);
            $temp->contacts= str_random(30);
            $temp->description= str_random(255);
            $temp->uni_logo= str_random(255);
            $temp->x=rand(100,900)/100 ;
            $temp->y=rand(100,900)/100 ;
            $temp->save();
        }
    }
}
