<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beach extends Model
{
    use SoftDeletes;
    use HasFactory;
    protected $fillable = [
        "name",
        "location",
        "umbrella_number",
        "sunbed_number",
        "umbrella_price_per_day",
        "opening_date",
        "closing_date",
        "beachvolley_court",
        "football_court",
    ];
}
