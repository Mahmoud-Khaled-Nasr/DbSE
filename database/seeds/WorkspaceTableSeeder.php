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
        $faker=\Faker\Factory::create();
        for ($i=0;$i<20;$i++){
            $table=new Workspace();
            $table->name=$faker->firstName;
            $table->type=(rand(0,1))?'PAID':'FREE';
            $table->email=$faker->email;
            $table->save();
        }
    }
}
