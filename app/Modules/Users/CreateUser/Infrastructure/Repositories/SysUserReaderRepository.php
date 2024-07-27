<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Infrastructure\Repositories;

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
        if (!$result = $this->query($sql)) {
            return null;
        }
        return (int) $result[0]->id;
    }
}
