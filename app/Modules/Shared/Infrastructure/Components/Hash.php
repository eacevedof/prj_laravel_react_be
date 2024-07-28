<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

use Illuminate\Support\Facades\Hash as IlluminateHash;

final class Hash
{
    public static function getHashResult(string $string): string
    {
        return IlluminateHash::make($string);
    }
}
