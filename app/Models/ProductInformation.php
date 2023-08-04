<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductInformation extends Model
{
    use HasFactory;

    public $fillable = [
        "marketplace",
        "name",
        "saler",
        "manufacture",
        "color",
        "sfera",
        "analog_rg",
        "width",
        "diametr",
        "link",
    ];

    public function tovar_price() {
        return $this->hasMany(GettingPrice::class);
    }
}
