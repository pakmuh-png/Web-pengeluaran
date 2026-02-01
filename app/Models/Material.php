<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    protected $fillable = [
        'material_code',
        'description',
        'qty',
        'uom',
        'bin_location',
        'storage_location',
    ];
}
