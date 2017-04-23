<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcadfacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acadfaculties', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('academy_id');
            $table->float('fees',6,2);
            $table->timestamps();
            $table->string('name',80);
            $table->string('city',60);
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('description',255);
            $table->string('departments',255);
            $table->string('logo',255);
            $table->string('pic1',255);
            $table->string('pic2',255);
            $table->string('location',100);
            $table->double('x',20,15);
            $table->double('y',20,15);
            $table->string('president_name',40);
            $table->string('past_presidents',255);
            $table->string('contacts',255);
            $table->string('others',255);
        });

        Schema::table('acadfaculties', function(Blueprint $table) {
            $table->foreign('academy_id')->references('id')->on('academies')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acadfaculties');
    }
}
