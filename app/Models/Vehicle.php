<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'brand',
        'model',
        'year',
        'owner',
        'price',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'dueno');
    }

    // You might also want to define a relationship for the ownership history
    public function ownershipHistory()
    {
        return $this->hasMany(VehicleOwnershipHistory::class, 'vehicle_id');
    }
}