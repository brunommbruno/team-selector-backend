<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamModel;
use App\Models\PlayerModel;

use App\Http\Requests\API\PlayerRequest;
use App\Http\Resources\API\PlayerResource;

class Player extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TeamModel $team)
    {
        return PlayerResource::collection($team->players);
    }

    public function indexAll()
    {
        return PlayerResource::collection(PlayerModel::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PlayerRequest $request, TeamModel $team)
    {
        $data = $request->only([
            'player_name',
            'player_skill',
            'player_position',
        ]);

        $player = new PlayerModel($data);
        $player->team_model()->associate($team);
        $player->save();

        return new PlayerResource($player);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PlayerModel $player)
    {
        return new PlayerResource($player);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PlayerRequest $request, PlayerModel $player)
    {
        $data = $request->all();
        $player->fill($data)->save();
        return PlayerResource($player);
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
