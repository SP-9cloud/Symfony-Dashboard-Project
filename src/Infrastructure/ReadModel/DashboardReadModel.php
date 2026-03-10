<?php

namespace App\Infrastructure\ReadModel;

use Doctrine\DBAL\Connection;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class DashboardReadModel
{
    private Connection $connection;
    private CacheInterface $cache;

    public function __construct(Connection $connection, CacheInterface $cache)
    {
        $this->connection = $connection;
        $this->cache = $cache;
    }

    public function fetchDashboardData(int $page = 1): array
    {
        $limit = 50;
        $offset = ($page - 1) * $limit;

        return $this->cache->get('dashboard_page_' . $page, function(ItemInterface $item) use ($limit, $offset) {

            $item->expiresAfter(60);

            $queryBuilder = $this->connection->createQueryBuilder();

            $queryBuilder
                ->select('id', 'site_name', 'visits')
                ->from('dashboard_records')
                ->orderBy('id', 'DESC')
                ->setMaxResults($limit)
                ->setFirstResult($offset);

            return $queryBuilder->fetchAllAssociative();

        });
    }
}