<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\Match;
use App\Http\Controllers\API\Team;
use App\Http\Controllers\API\Player;


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// /match
Route::group(["prefix" => "match"], function() {

    //GET /match: gets all matches created
    Route::get("", [Match::class, "indexAll"]);

    //POST /match: creates a new match
    Route::post("", [Match::class, "store"]);

    // /match/{match_id}
    Route::group(["prefix" => "{match}"], function() {

        //DELETE /match/1: deletes specific match
        Route::delete("", [Match::class, "destroy"]);

        // /match/{match_id}/teams
        Route::group(["prefix" => "teams"], function() {
            //GET /match/1/teams: gets both teams for a specific match
            Route::get("", [Team::class], "index");
        });
    });
});

// /teams
Route::group(["prefix" => "teams"], function() {

    //GET /teams: gets all teams created
    Route::get("", [Team::class], "indexAll");

    //POST /teams: creates a new team
    Route::post("", [Team::class], "store");

    // /team/{team_id}
    Route::group(["prefix" => "{team}"], function() {

        //GET /teams/1: shows specific team
        Route::get("", [Team::class], "show");

        //PATCH /teams/1: update specific team
        Route::patch("", [Team::class], "update");

        //DELETE /teams/1: delete specific team
        Route::delete("", Team::class, "destroy");

        // /teams/1/players
        Route::group(["prefix" => "players"], function() {

            //GET /teams/1/players: gets all players for a team
            Route::get("", [Player::class], "index");
        });

    });
});

// /players
Route::group(["prefix" => "players"], function() {

    //GET /players: gets all players created
    Route::get("", [Player::class], "indexAll");

    //POST /players: creates a new player
    Route::post("", [Player::class], "store");

    // /players/{player_id}
    Route::group(["prefix" => "{player}"], function() {

        //GET /players/1: shows specific player
        Route::get("", [Player::class], "index");

        //PATCH /players/1: updates specific player
        Route::patch("", [Player::class], "update");

        //DELETE /players/1: deletes specific player
        Route::delete("", [Player::class], "destroy");
    });
});