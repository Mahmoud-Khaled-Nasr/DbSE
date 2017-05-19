<?php

use Illuminate\Database\Seeder;
use App\Workspace;

class WorkspaceTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $states=array("cairo","giza","alex","aswan","port said");
        $cities=array("dokki","hadayek elmaadi","6th october","helwan","hadayek elahram");

        $faker=\Faker\Factory::create();
        for ($i=0;$i<20;$i++){
            $table=new Workspace();
            $table->name=$faker->firstName;
            $table->type=(rand(0,1))?'PAID':'FREE';
            $table->email=$faker->email;
            $table->city=$cities[rand(0,4)];
            $table->state=$states[rand(0,4)];
            $table->location = $faker->address;
            $table->website_url = $faker->url;
            $table->facebook_page = $faker->url;
            $temp=rand(1,3);
            $numbers=$faker->phoneNumber;
            for ($j=0;$j<$temp;$j++){
                $numbers=$numbers.'/'.$faker->phoneNumber;
            }
            $table->contacts= $numbers;
            $table->fees =($table->type=='PAID')? rand(100, 900) / 10:0;
            $table->description= $faker->realText(200);
            $table->classification = str_random(10);
            $table->logo = "storage/workspaces/4.jpg";
            $table->pic1 = "storage/workspaces/4.jpg";
            $table->pic2 = "storage/workspaces/4.jpg";
            $table->pic3 = "storage/workspaces/4.jpg";
            $table->video = "storage/workspaces/4.jpg";
            $table->x = rand(100, 900) / 100;
            $table->y = rand(100, 900) / 100;
            $table->air_conditioning =(rand(0,1))?'1':'0';
            $table->private_rooms =(rand(0,1))?'1':'0';
            $table->data_show =(rand(0,1))?'1':'0';
            $table->wifi =(rand(0,1))?'1':'0';
            $table->laser_cutter =(rand(0,1))?'1':'0';
            $table->printing_3D =(rand(0,1))?'1':'0';
            $table->PCB_printing =(rand(0,1))?'1':'0';
            $table->girls_area =(rand(0,1))?'1':'0';
            $table->smoking_area =(rand(0,1))?'1':'0';
            $table->cafeteria =(rand(0,1))?'1':'0';
            $table->cyber =(rand(0,1))?'1':'0';
            $table->save();
        }
    }
}
