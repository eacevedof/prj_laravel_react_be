<?php

declare(strict_types=1);

namespace App\Modules\Users\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\Repositories\AbstractRepository;

final class SysUserReaderRepository extends AbstractRepository
{
    public function getUserIdByUsername(string $username): ?int
    {
        $sql = "
        -- getUserIdByUsername
        SELECT id
        FROM  sys_user
        WHERE 1
        AND username = '{$username}'
        ";
        $this->logQuery($sql);
        if (!$result = $this->query($sql)) {
            return null;
        }

        return (int) $result[0]->id;
    }

    public function getUserByUserUuid(string $userUuid): ?object
    {
        $sql = "
        -- getUserByUsername
        SELECT *
        FROM sys_user
        WHERE 1
        AND uuid = '{$userUuid}'
        ";
        $this->logQuery($sql);
        if (!$result = $this->query($sql)) {
            return null;
        }

        $this->mapColumnToInt($result, "id")
            ->mapColumnToInt($result, "is_enabled");
        return $result[0];
    }
}
