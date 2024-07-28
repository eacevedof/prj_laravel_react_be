<?php

declare(strict_types=1);

namespace App\Modules\Shared\Domain\Enums;

enum ValidatePatternEnum: string
{
    case EMAIL = "^[\\w\\.-]+@[\\w\\.-]+\\.[a-zA-Z]{2,4}$";
    case PASSWORD = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\\d)[a-zA-Z\\d]{8,}$";
    case NAME = "^[a-zA-Z]+(([',. -][a-zA-Z ])?[a-zA-Z]*)*$";
}
