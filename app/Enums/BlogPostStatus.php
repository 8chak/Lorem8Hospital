<?php

namespace App\Enums;

enum BlogPostStatus: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
}
