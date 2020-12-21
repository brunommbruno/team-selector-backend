<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MatchModel;
use App\Models\PlayerModel;

class TeamModel extends Model
{
    use HasFactory;

    protected $fillable = ["team_name", "team_color", "team_kit", "score", "match_models_id"];

    //each team is a child to a parent match model
    public function match_model(){
        return $this->belongsTo(MatchModel::class);
    }

    //each team will be a parent to many player models
    public function players(){
        return $this->hasMany(PlayerModel::class);
    }

}

