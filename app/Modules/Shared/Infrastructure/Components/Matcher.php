<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

use App\Modules\Shared\Domain\Enums\ValidatePatternEnum;

final class Matcher
{
    public static function doesStringMatchPattern(string $string, string $pattern): bool
    {
        return 1 === preg_match("/{$pattern}/", $string);
    }

    public static function doesStringMatchValidationPattern(
        string $string,
        ValidatePatternEnum $validatePatternEnum
    ): bool
    {
        return self::doesStringMatchPattern($string, $validatePatternEnum->value);
    }

}
