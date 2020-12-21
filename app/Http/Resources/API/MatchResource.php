<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

//teams that are returned in match GET are also formatted
use App\Http\Resources\API\TeamResource;

class MatchResource extends JsonResource
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
            "teams" => TeamResource::collection($this->teams),
        ];
    }
}
