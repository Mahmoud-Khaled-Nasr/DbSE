<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculties', function (Blueprint $table) {
            $table->increments('fid');
            $table->unsignedInteger('university_id');
            $table->timestamps();
            $table->string('fname',40);
            $table->string('fpresident_name',30);
            $table->string('fpast_presidents',255);
            $table->string('furl',255);
            $table->string('ffb_url',255);
            $table->string('fcontacts',30);
            $table->string('fdescription',255);
            $table->string('departments',255);
            $table->longText('f_logo');
            $table->double('fx',20,15);
            $table->double('fy',20,15);
        });

        Schema::table('faculties', function(Blueprint $table) {
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculties');
    }
}
