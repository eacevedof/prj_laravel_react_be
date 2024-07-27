<?php

declare(strict_types=1);

namespace App\Modules\Users\CreateUser\Infrastructure\Repositories;

use App\Modules\Shared\Infrastructure\Repositories\AbstractRepository;

final class UserReaderRepository extends AbstractRepository
{
    public function getUserIdByUsername(string $username): int
    {
        $sql = "";
        return $this->query("SELECT * FROM users WHERE id = $username");
    }
}
