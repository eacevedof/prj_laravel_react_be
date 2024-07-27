<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;

final class AbstractRepository
{
    protected function query(string $sql): array
    {
        return DB::select($sql);
    }

    protected function command(string $table): object
    {
        return DB::table($table);
    }

}
