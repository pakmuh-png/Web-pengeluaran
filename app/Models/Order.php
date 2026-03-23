<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_id',
        'user_id',
        'area_id',
        'pabrik_id',
        'order_date',
        'quantity',
        'no_reservation',
        'status',
        'shift',
        'planner_id',
        
    ];
}
