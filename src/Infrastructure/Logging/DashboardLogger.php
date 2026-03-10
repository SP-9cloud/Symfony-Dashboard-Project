<?php

namespace App\Infrastructure\Logging;

use Psr\Log\LoggerInterface;

class DashboardLogger
{
    private LoggerInterface $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function logDashboardLoad(int $count): void
    {
        $this->logger->info('Dashboard loaded', [
            'records_returned' => $count
        ]);
    }
}