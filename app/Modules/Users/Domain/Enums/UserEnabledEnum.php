<?php

declare(strict_types=1);

namespace App\Modules\Users\Domain\Enums;

enum UserEnabledEnum: int
{
    case ENABLED = 1;
    case DISABLED = 0;
}
