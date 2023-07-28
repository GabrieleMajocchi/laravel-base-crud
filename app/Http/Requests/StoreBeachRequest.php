<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreBeachRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "name" => ["required", "string", "min:3"],
            "location" => ["required", "string", "min:10"],
            "umbrella_number" => ["integer", "max:100", "min:10"],
            "sunbed_number" => ["integer", "lt:200", "gt:20"],
            "umbrella_price_per_day" => ["required", "lt:50", "gt:5"],
            "opening_date" => ["required", "date"],
            "closing_date" => ["required", "date"],
            "beachvolley_court" => ["nullable"],
            "football_court" => ["nullable"]
        ];
    }
}
