<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carinfos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('fullname');
            $table->string('mobilenumber')->unique();
            $table->string('carnumber')->unique();
            $table->string('image1');
            $table->string('image2');
            $table->integer('govid');
            $table->integer('cityid');
            $table->string('code')->unique();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carinfos');
    }
}
