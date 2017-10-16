<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('iduser');
            $table->string('firstname');
            $table->string('lastname');
            $table->longText('introduce');  
            $table->string('phone');
            $table->string('mail');
            $table->string('skype');
            $table->string('birthday');
            $table->string('address');
            $table->string('picture');
            $table->string('name_cv');
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
        Schema::dropIfExists('information');
    }
}
