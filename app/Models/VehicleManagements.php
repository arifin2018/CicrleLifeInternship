<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VehicleManagements extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'vehicle_managements';

    public function user()
    {
        return $this->belongsTo(User::class, 'driver_id', 'id');
    }
}
