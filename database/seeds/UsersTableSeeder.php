<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $table=new \App\User();
        $table->username='mk';
        $table->email='mk@gmail.com';
        $table->password=bcrypt("aaaa");
        $table->save();
    }
}
