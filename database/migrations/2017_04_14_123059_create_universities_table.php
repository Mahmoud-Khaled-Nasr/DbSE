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
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->string('description',255);
            $table->longText('logo');
            $table->double('x',20,15);
            $table->double('y',20,15);

            //TODO put them in another tables with forgien keys
            $table->string('president_name',30);
            $table->string('past_presidents',255);
            $table->string('contacts',30);
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
