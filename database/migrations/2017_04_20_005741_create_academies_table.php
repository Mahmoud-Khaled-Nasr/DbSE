<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcademiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('academies', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',40);
            $table->string('logo',255)->nullable();
            $table->string('pic1',255)->nullable();
            $table->string('pic2',255)->nullable();
            $table->string('description',255);
            $table->string('city',20);
            $table->string('contacts',30);
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('location',100);
            $table->double('x',20,15);
            $table->double('y',20,15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('academies');
    }
}
