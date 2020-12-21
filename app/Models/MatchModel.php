<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TeamModel;

class MatchModel extends Model
{
    use HasFactory;

    //each match will be a parent to many team models
    public function teams(){
        return $this->hasMany(TeamModel::class);
    }
}
