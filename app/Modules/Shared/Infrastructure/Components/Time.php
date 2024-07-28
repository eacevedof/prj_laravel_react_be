<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

final class Time
{
    public static function now(): string
    {
        return date("Y-m-d H:i:s");
    }
}
