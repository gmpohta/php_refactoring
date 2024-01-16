<?php

declare(strict_types=1);

namespace App\Refactor\Enums;

enum AutoEnum: string
{
    case CAR = 'car';
    case SPECIAL_AUTO = 'spec_machine';
    case TRUCK = 'truck';
}
