<?php

namespace App\Controllers;

use App\Database\DoctrineService;
use Doctrine\DBAL\Exception;

class Home extends BaseController
{
    public function index(): string
    {
        $doctrineService = new DoctrineService();
        $connection = $doctrineService->getDoctrineConnection();

        try {
            $query = $connection->prepare('INSERT INTO product (id, name_produto, preco) VALUES (?, ?, ?)');
            $query->bindValue(1, 2);
            $query->bindValue(2, 'Produto teste');
            $query->bindValue(3, 10.99);
            $query->executeStatement();

            error_log('Produto inserido com sucesso!');
            return 'Produto inserido com sucesso!';
        } catch (Exception $e) {
            error_log('Erro ao inserir produto: ' . $e->getMessage());
            return 'Erro ao inserir produto: ' . $e->getMessage();
        }
    }
}
