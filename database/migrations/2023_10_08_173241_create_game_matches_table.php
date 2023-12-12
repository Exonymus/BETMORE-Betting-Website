<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('game_matches', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('team1_id');
            $table->float('team1_cef')->nullable();
            $table->integer('team1_points')->nullable();
            $table->unsignedBigInteger('team2_id');
            $table->float('team2_cef')->nullable();
            $table->integer('team2_points')->nullable();
            $table->date('date');
            $table->time('time');
            $table->string('tournament');
            $table->string('format')->nullable();
            $table->string('scrap_url');
            $table->integer('live');
            $table->string('results')->nullable();
            $table->unsignedBigInteger('winner_id')->nullable();

            $table->foreign('team1_id')->references('id')->on('teams');
            $table->foreign('team2_id')->references('id')->on('teams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('matches');
    }
}
