<?php

namespace App\Modules\Shared\Domain\Enums;

enum PlatformEnum: int
{
    case UNKNOWN = 5;
    case CLI = 10;
    case ETL = 15;
    case FRONTEND = 20;
    case MOBILE = 25;
}
