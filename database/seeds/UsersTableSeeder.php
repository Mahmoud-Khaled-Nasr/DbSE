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
        $table->type='VISITOR';
        $table->save();
        $table=new \App\User();
        $table->username='amir';
        $table->email='amir@gmail.com';
        $table->password=bcrypt("bbbb");
        $table->type='VISITOR';
        $table->save();
        $table=new \App\User();
        $table->username='pmk';
        $table->email='pmk@gmail.com';
        $table->password=bcrypt("aaaa");
        $table->type='PWSO';
        $table->save();
        $table=new \App\User();
        $table->username='wmk';
        $table->email='wmk@gmail.com';
        $table->password=bcrypt("aaaa");
        $table->type='WSO';
        $table->save();
    }
}
