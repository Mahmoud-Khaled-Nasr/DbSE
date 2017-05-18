<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        for ($i=0;$i<30;$i++){
            $event=new Event();
            $event->workspace_id=rand(0,9);
            $event->name=$faker->title;
            $event->address=$faker->address;
            $event->description=$faker->realText(200);
            $event->save();
        }
    }
}
