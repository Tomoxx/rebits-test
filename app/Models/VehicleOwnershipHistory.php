<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleOwnershipHistory extends Model
{
    use HasFactory;

    protected $table = 'vehicle_ownership_history';

    protected $fillable = [
        'vehicle',
        'previous_owner',
        'new_owner',
    ];

    public function vehicle()
    {
        return $this->belongsTo(Vehicle::class, 'vehicle');
    }

    public function previousOwner()
    {
        return $this->belongsTo(User::class, 'previous_owner');
    }

    public function newOwner()
    {
        return $this->belongsTo(User::class, 'new_owner');
    }
}
