<?php

declare(strict_types=1);

namespace App\Modules\Shared\Infrastructure\Repositories;

use Illuminate\Support\Facades\DB;

abstract class AbstractRepository
{
    protected ?int $lastId = null;

    public function getDatetimeNow(): string
    {
        return date("Y-m-d H:i:s");
    }
    protected function query(string $sql): array
    {
        return DB::select($sql);
    }

    protected function command(string $table): object
    {
        return DB::table($table);
    }

    protected function getIntegersSqlIn(array $entityIds): string
    {
        if (! $entityIds) {
            return "";
        }
        $entityIds = array_unique($entityIds);
        $entityIds = array_map(fn ($id) => (int) $id, $entityIds);
        sort($entityIds);
        return implode(", ", $entityIds);
    }

    protected function getStringsSqlIn(array $entityUuids): string
    {
        if (! $entityUuids) {
            return "";
        }
        $entityUuids = array_unique($entityUuids);
        $entityUuids = array_map(fn ($uuid) => $this->getEscapedSqlString($uuid), $entityUuids);
        sort($entityUuids);
        return "'" . implode("', '", $entityUuids) . "'";
    }

    protected function getEscapedSqlString(string $string): string
    {
        return str_replace("'", "''", $string);
    }

    protected function mapColumnToInt(array &$objects, string $column): self
    {
        foreach ($objects as $obj) {
            $obj->{$column} = (int) $obj->{$column};
        }
        return $this;
    }

}
