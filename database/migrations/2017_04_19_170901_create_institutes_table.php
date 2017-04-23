<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstitutesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('institutes', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',60);
            $table->string('description',255);
            $table->string('city',60);
            $table->string('contacts',255);
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('location',100);
            $table->double('x',20,15);
            $table->double('y',20,15);
            $table->string('departments',255);
            $table->float('fees',4,2)->nullable();
            $table->string('others',255)->nullable();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('institutes');
    }
}
