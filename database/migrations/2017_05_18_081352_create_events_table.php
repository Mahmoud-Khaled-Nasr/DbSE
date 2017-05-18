<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->unsignedInteger('workspace_id');
            $table->string('name',30);
            $table->string('address',100);
            $table->string('description',255);
        });

        Schema::table('events', function(Blueprint $table) {
            $table->foreign('workspace_id')->references('id')->on('workspaces')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
