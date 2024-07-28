<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Components;

final class Uuid
{
    public static function getUuid(): string
    {
        $prefix = date("YmdHis");
        $uuid = uniqid("{$prefix}_", true);
        $uuid = md5($uuid);
        return $uuid;
    }

    public static function getUuidWithPrefix(string $prefix): string
    {
        $prefixDate = "{$prefix}" . date("YmdHis");
        $uuid = uniqid("{$prefixDate}_", true);
        $uuid = md5($uuid);
        return "{$prefix}-{$uuid}";
    }
}
