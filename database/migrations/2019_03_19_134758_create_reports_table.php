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
            $table->primary('id');
            // Chiavi esterne
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->reference('id')->on('users');
            $table->unsignedBigInteger('code_id');
            $table->foreign('code_id')->reference('id')->on('codes');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->reference('id')->on('zones');
            // Altri campi
            $table->string('title', 100);
            $table->string('address');
            $table->string('street_number')->nullable();
            $table->string('description', 2000);
            $table->string('tags');
            $table->string('media');
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
