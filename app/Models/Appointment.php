<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\AppointmentStatus;

class Appointment extends Model
{
    
    protected $guarded = [];

    protected $casts = [
        'status' => AppointmentStatus::class,
    ];
}
