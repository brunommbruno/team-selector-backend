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

    public function match(){
        return $this->belongsTo(MatchModel::class);
    }

    public function players(){
        return $this->hasMany(PlayerModel::class);
    }

}

