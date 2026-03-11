<?php

namespace App\Domain\Dashboard\Entity;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: "dashboard_records")]
class DashboardRecord
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 120)]
    private string $siteName;

    #[ORM\Column]
    private int $visits;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    public function __construct(string $siteName, int $visits)
    {
        $this->siteName = $siteName;
        $this->visits = $visits;
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiteName(): string
    {
        return $this->siteName;
    }

    public function getVisits(): int
    {
        return $this->visits;
    }
    
}
