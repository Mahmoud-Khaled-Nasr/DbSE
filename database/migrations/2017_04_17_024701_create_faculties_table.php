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
            $table->float('fees',6,2)->nullable();
            $table->timestamps();
            $table->string('fname',40);
            $table->string('city',20);
            $table->string('fwebsite',255);
            $table->string('ffacebook_page',255);
            $table->string('fdescription',255);
            $table->string('departments',255);
            $table->string('flogo',50)->nullable();
            $table->string('fpic1',50)->nullable();
            $table->string('fpic2',50)->nullable();
            $table->string('location',100);
            $table->double('fx',20,15);
            $table->double('fy',20,15);
            $table->string('fpresident_name',30);
            $table->string('fpast_presidents',255);
            $table->string('fcontacts',30);
            $table->string('others',255)->nullable();
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
