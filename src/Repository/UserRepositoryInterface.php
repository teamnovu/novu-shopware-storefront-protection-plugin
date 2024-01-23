<?php
declare(strict_types=1);

namespace Jeboehm\AccessProtection\Repository;

interface UserRepositoryInterface
{
    public function checkUser(string $username, string $password, string $salesChannelId): void;
}
