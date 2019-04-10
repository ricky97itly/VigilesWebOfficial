<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            // Chiave primaria
            $table->bigIncrements('id');
            // Chiavi esterne
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('code_id')->nullable();
            $table->foreign('code_id')->references('id')->on('codes');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones');
            // Altri campi
            $table->string('title', 100);
            $table->string('address');
            $table->string('street_number')->nullable();
            $table->string('description', 2000)->nullable();
            $table->string('tags', 200)->nullable();
            $table->string('media', 300)->nullable();
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
        Schema::dropIfExists('reports');
    }
}
