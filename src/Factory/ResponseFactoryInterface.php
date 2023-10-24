<?php
declare(strict_types=1);

namespace Jeboehm\AccessProtection\Factory;

use Symfony\Component\HttpFoundation\Response;

interface ResponseFactoryInterface
{
    public function createResponse(string $salesChannelId): Response;
}
