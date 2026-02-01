<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Planner extends Model
{
    protected $table = 'planners';

    protected $fillable = [
        'name',
        'phone',
    ];
}
