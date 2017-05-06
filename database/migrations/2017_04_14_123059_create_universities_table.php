<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUniversitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('name',40);
            $table->string('city',60);
            $table->string('type',15);

            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('description',255);

            //TODO add table for pictures
            $table->string('logo',255)->nullable();
            $table->string('pic1',255)->nullable();
            $table->string('pic2',255)->nullable();
            $table->string('pic3',255)->nullable();
            $table->string('pic4',255)->nullable();
            $table->string('pic5',255)->nullable();

            $table->string('location',100);
            $table->double('x',20,15);
            $table->double('y',20,15);

            $table->string('president_name',30);
            $table->string('past_presidents',255);
            $table->string('contacts',255);
            $table->string('rank',255);
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
        Schema::dropIfExists('universities');
    }
}
