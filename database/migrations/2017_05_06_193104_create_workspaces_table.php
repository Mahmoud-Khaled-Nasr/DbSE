<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWorkspacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspaces', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->enum('type',['PAID','FREE']);
            $table->string('name',25);
            $table->string('email',50);
            $table->string('state',25);
            $table->string('city',25);
            $table->string('logo',255);
            $table->string('location',100);
            $table->string('contacts',255);
            $table->string('website_url',255);
            $table->string('facebook_page',255);
            $table->float('rate',2,1);
            $table->string('description',255);
            $table->string('classification',100);
            $table->float('fees',6,3);
            $table->double('x',20,15);
            $table->double('y',20,15);
            $table->boolean('air_conditioning');
            $table->boolean('private_rooms');
            $table->boolean('data_show');
            $table->boolean('wifi');
            $table->boolean('laser_cutter');
            $table->boolean('printing_3D');
            $table->boolean('PCB_printing');
            $table->boolean('girls_area');
            $table->boolean('smoking_area');
            $table->boolean('cafeteria');
            $table->boolean('cyber');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workspaces');
    }
}
