<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeamModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_models', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("team_name", 20);
            $table->string("team_color", 10);
            $table->string("team_kit", 20);
            $table->integer("score");
            $table->foreignId("match_models_id")
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
        Schema::dropIfExists('team_models');
    }
}
