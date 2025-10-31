<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Database\DatabaseConnection;
use App\View\View;
use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class DashboardController extends BaseController
{
    public function __construct(
        private readonly DatabaseConnection $databaseConnection,
        View $view
    ) {
        parent::__construct($view);
    }

    public function __invoke(ServerRequestInterface $request): Response
    {
        $conn = $this->databaseConnection->getConnection();

        $conn->executeStatement("
        CREATE TABLE IF NOT EXISTS dashboard (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            description TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )
    ");

        return $this->render('Dashboard/dashboard.twig');
    }
}