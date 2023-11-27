<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vehicle extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id',
        'brand',
        'model',
        'year',
        'owner_id',
        'price',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function ownershipHistory()
    {
        return $this->hasMany(VehicleOwnershipHistory::class, 'vehicle_id');
    }
}