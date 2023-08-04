<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GettingPrice extends Model
{
    use HasFactory;

    public $fillable = [
        'load_at',
        'load_id',
        'product_information_id',
        "name",
        "marketplace",
        'src_price_value',
        'total_price_value',
        'one_price_value',
        'loadet'
    ];
}
