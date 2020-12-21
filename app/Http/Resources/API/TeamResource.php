<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id" => $this->id,
            "team_name" => $this->team_name,
            "team_color" => $this->team_color,
            "team_kit" => $this->team_kit,
            "score" => $this->score,
            "match_id" => $this->match_model_id,
        ];
    }
}
