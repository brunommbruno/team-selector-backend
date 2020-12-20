<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlayerModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('player_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("player_name", 20);
            $table->integer("player_skill");
            $table->string("player_position");
            $table->foreignId("team_models_id")
            ->constrained()
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('player_models');
    }
}
