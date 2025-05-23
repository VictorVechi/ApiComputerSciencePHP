<?php

namespace App\Database;

use Doctrine\DBAL\DriverManager;
use Doctrine\DBAL\Exception;

class DoctrineService
{
    private $connection;

    public function __construct()
    {
        $connectionParams = [
            'dbname' => env('MYSQL_DATABASE'),
            'user' => env('MYSQL_USER'),
            'password' => env('MYSQL_PASSWORD'),
            'host' => env('MYSQL_HOST'),
            'driver' => 'mysqli',
            'port' => 3306,
        ];

        try {
            $this->connection = DriverManager::getConnection($connectionParams);
        } catch (Exception $e) {
            die('Erro ao conectar ao banco de dados: ' . $e->getMessage());
        }
    }

    public function getDoctrineConnection()
    {
        return $this->connection;
    }
}
