<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'driver_id', 'vehicles_id', 'mines_id', 'start_date', 'end_date', 'status',
    ];

    protected $casts = [
        'status' => 'string',
    ];

    public function driver(): BelongsTo
    {
        return $this->belongsTo(Driver::class);
    }

    public function vehicle(): BelongsTo
    {
        return $this->belongsTo(Vehicle::class, 'vehicles_id');
    }

    public function mine(): BelongsTo
    {
        return $this->belongsTo(Mine::class, 'mines_id');
    }

    public function approvals(): HasMany
    {
        return $this->hasMany(Approval::class);
    }
}
