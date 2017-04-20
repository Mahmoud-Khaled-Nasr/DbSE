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
            $table->string('name',40);
            $table->string('logo',255)->nullable();
            $table->string('location',100);
            $table->string('contacts',30);
            $table->string('website',255);
            $table->string('facebook_page',255);
            $table->string('description',255);
            $table->string('classification',100);
            $table->float('fees',6,2)->nullable();
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
