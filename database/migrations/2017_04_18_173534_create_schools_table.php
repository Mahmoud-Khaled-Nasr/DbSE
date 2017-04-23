<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
<<<<<<< HEAD
            $table->string('name',60);
            $table->string('logo',255);
=======
            $table->string('name',40);
            $table->string('logo',255);
            $table->string('city',20);
>>>>>>> amir
            $table->string('location',100);
            $table->string('contacts',255);
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('description',255);
            $table->string('classification',100);
            $table->float('fees',6,2);
            $table->double('x',20,15);
            $table->double('y',20,15);
            $table->string('others',255);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schools');
    }
}
