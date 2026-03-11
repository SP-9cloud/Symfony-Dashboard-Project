<?php

namespace App\Controller;

use App\Infrastructure\ReadModel\DashboardReadModel;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    #[Route('/dashboard', name: 'dashboard')]
    public function index(DashboardReadModel $readModel): JsonResponse
    {
        $start = microtime(true);

        $data = $readModel->fetchDashboardData(1);

        $time = microtime(true) - $start;

        return $this->json([
            'records' => $data,
            'execution_time' => $time
        ]);
        
    }
}
