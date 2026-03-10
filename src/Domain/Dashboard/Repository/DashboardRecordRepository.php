<?php

namespace App\Domain\Dashboard\Repository;

use App\Domain\Dashboard\Entity\DashboardRecord;

interface DashboardRepository
{
    public function save(DashboardRecord $record): void;

    public function findAll(): array;
}