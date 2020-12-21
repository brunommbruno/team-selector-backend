<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamModel;
use App\Models\MatchModel;

use App\Http\Requests\API\TeamRequest;

class Team extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexAll()
    {
        //returns all teams
        return TeamModel::all();
    }

    public function index(MatchModel $match)
    {
        return $match->teams;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeamRequest $request, MatchModel $match)
    {
        $data = $request->only([
            'team_name',
            'team_color',
            'team_kit',
            'score',
            'match_model_id'
        ]);

        $team = new TeamModel($data);
        $team->match_model()->associate($match);
        $team->save();

        return $team;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TeamModel $team)
    {
        return $team;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeamRequest $request, TeamModel $team)
    {
        $data = $request->all();
        $team->fill($data)->save();
        return $team;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TeamModel $team)
    {
        $team->delete();

        return response(null, 204);
    }
}
