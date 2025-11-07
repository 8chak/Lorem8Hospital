<?php

namespace App\Enums;

enum AppointmentStatus : string
{
    case APPLIED = 'applied';
    case APPROVED = 'approved';
    case CANCELLED = 'cancelled';
}
