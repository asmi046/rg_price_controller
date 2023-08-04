<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Load extends Model
{
    use HasFactory;

    public $fillable = [
        'start_at',
        'finish_at',
        'count_in_base',
        'count_fine',
        'count_bug',
        'bug_track'
    ];


}
