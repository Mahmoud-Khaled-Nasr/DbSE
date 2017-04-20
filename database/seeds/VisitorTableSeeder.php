<?php

use Illuminate\Database\Seeder;
use App\Visitor;

class VisitorTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table=new Visitor();
        $table->name="amir farag";
        $table->user_id=2;
        $table->gender='MALE';
        $table->save();
        $table=new Visitor();
        $table->name="mahmoud Khaled";
        $table->user_id=1;
        $table->gender='MALE';
        $table->save();
    }
}
