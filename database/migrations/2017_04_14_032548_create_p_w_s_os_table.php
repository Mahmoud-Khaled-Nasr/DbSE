<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePWSOsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * @TODO
         * complete the PWSO table
         */
        Schema::create('p_w_s_os', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();

            $table->string('name',40);
            $table->string('username',20)->unique();
            $table->string('email',20)->unique();
            $table->string('password',100);

            //$table->unique(['username','email']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('p_w_s_os');
    }
}
