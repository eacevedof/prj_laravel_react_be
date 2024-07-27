<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;

final class AbstractRepository
{
    private function query(string $sql): array
    {
        return DB::select($sql);
    }

    private function command(string $table): object
    {
        return DB::table($table);
    }

}
