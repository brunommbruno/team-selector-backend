<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamModel;
use App\Models\PlayerModel;

class Player extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeamModel $team)
    {
        return $team->players;
    }

    public function indexAll()
    {
        return PlayerModel::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, TeamModel $team)
    {
        $data = $request->only([
            'player_name',
            'player_skill',
            'player_position'
        ]);

        $player = new PlayerModel($data);
        $player->team()->associate($team);
        $player->save();

        return $player;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerModel $player)
    {
        return $player;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PlayerModel $player)
    {
        $data = $request->all();
        $player->fill($data)->save();
        return $player;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayerModel $player)
    {
        $player->delete();
        
        return response(null, 204);
    }
}
