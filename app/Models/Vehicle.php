<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type', 'number_plate', 'brand', 'model', 'owned_by', 'status',
    ];

    protected $casts = [
        'type' => 'string',
        'owned_by' => 'string',
        'status' => 'string',
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function fuelConsumptions(): HasMany
    {
        return $this->hasMany(FuelConsumption::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
