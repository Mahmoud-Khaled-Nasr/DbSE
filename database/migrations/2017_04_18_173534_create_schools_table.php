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
            $table->string('sname',40);
            $table->string('city',40);
            $table->string('sowner_name',30);
            $table->string('swebsite',255);
            $table->string('sfacebook_page',255);
            $table->string('scontacts',30);
            $table->float('fees',6,2)->nullable();
            $table->string('description',255);
            $table->string('stages',255);
            $table->string('classification',100);
            $table->longText('slogo')->nullable();
            $table->longText('spic1')->nullable();
            $table->longText('spic2')->nullable();
            $table->double('sx',20,15);
            $table->double('sy',20,15);

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
