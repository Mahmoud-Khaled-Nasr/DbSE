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
        for ($i=0;$i<20;$i++){
            $table=new Academy();
            $table->name= str_random(10);
            $table->city= str_random(10);
            $table->website_url= str_random(255);
            $table->facebook_page= str_random(255);
            $table->contacts= str_random(30);
            $table->description= str_random(255);
            $table->logo= str_random(20);
            $table->pic1= str_random(20);
            $table->pic2= str_random(20);
            $table->location= str_random(50);
            $table->x=rand(100,900)/100 ;
            $table->y=rand(100,900)/100 ;
            $table->save();
        }
    }
}
