<?php

use Illuminate\Database\Seeder;
use App\PWSO;

class PWSOTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=\Faker\Factory::create();
        $table=new PWSO();
        $table->workspace_id=1;
        $table->user_id=3;
        $table->name=$faker->name;
        $table->phone=$faker->phoneNumber;
        $table->save();
    }
}
