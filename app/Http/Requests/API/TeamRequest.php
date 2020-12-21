<?php

namespace App\Http\Requests\API;

use Illuminate\Foundation\Http\FormRequest;

class TeamRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "team_name" => ["required", "string"],
            "team_color" => ["required", "string"],
            "team_kit" => ["required", "string"]
        ];
    }
}
