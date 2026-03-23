<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pabrik;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggans';

    protected $fillable = [
        'pabrik_id',
        'npk',
        'nama',
    ];

    public function pabrik(): BelongsTo
    {
        return $this->belongsTo(Pabrik::class);
    }
}
