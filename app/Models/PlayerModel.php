<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamModel;


class PlayerModel extends Model
{
    use HasFactory;

    protected $fillable = ["player_name", "player_skill", "player_position", "team_models_id"];

    //each player is a child to a parent team model
    public function team_model(){
        return $this->belongsTo(TeamModel::class);
    }
}
