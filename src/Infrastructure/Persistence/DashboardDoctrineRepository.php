<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Dashboard\Entity\DashboardRecord;
use App\Domain\Dashboard\Repository\DashboardRepository;
use Doctrine\ORM\EntityManagerInterface;

class DashboardDoctrineRepository implements DashboardRepository
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function save(DashboardRecord $record): void
    {
        $this->entityManager->persist($record);
        $this->entityManager->flush();
    }

    public function findAll(): array
    {
        return $this->entityManager
            ->getRepository(DashboardRecord::class)
            ->findAll();
    }
}