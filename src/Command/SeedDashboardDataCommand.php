<?php

namespace App\Command;

use App\Domain\Dashboard\Entity\DashboardRecord;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class SeedDashboardDataCommand extends Command
{
    protected static $defaultName = 'app:seed-dashboard-data';

    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Generating dashboard data...');

        for ($i = 1; $i <= 100000; $i++) {

            $record = new DashboardRecord(
                'Website_' . rand(1, 50),
                rand(100, 10000),
            );

            $this->entityManager->persist($record);

            if ($i % 500 === 0) {
                $this->entityManager->flush();
                $this->entityManager->clear();
                $output->writeln("Inserted $i records");
            }
            
        }

        $this->entityManager->flush();

        $output->writeln('Done inserting 100000 records.');
        

        return Command::SUCCESS;
    }
}
