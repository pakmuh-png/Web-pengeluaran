<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'material_id',
        'pelanggan_id',
        'area_id',
        'pabrik_id',
        'order_date',
        'quantity',
        'no_reservation',
        'status',
        'shift',
        'planner_id',
    ];

    /**
     * Interact with the order's status.
     * Maps the string enum ('true', 'false') to a boolean for ToggleColumn support.
     */
    protected function status(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value === 'true',
            set: fn ($value) => ($value === true || $value === 'true' || $value === 1 || $value === '1') ? 'true' : 'false',
        );
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(Material::class);
    }

    public function pelanggan(): BelongsTo
    {
        return $this->belongsTo(Pelanggan::class);
    }

    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class);
    }

    public function pabrik(): BelongsTo
    {
        return $this->belongsTo(Pabrik::class);
    }

    public function planner(): BelongsTo
    {
        return $this->belongsTo(Planner::class);
    }
}
