<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

use Illuminate\Support\Facades\Hash as IlluminateHash;

final class Hash
{
    public static function getHashResult(string $string): string
    {
        /*
        use Illuminate/Hashing/ArgonHasher::make()
        $hash = @password_hash($value, $this->algorithm(), [
            'memory_cost' => $this->memory($options),
            'time_cost' => $this->time($options),
            'threads' => $this->threads($options),
        ]);
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        if (password_verify($password, $hashedPassword)) {
         * */
        return IlluminateHash::make($string);
    }

    public static function doesStringHaveThisHash(string $string, string $hash): bool
    {
        return IlluminateHash::check($string, $hash);
    }
}
