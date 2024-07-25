<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepresentativesTable extends Migration
{
    public function up()
    {
        Schema::create('representatives', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->foreignId('school_id')->constrained()->onDelete('cascade');
            $table->string('password'); // password
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('representatives');
    }
}
