<?php

namespace App\Services;

use Exception;
use PDO;
use App\Config\Config;

class DataBase
{
    public PDO $pdo;

    public function __construct()
    {
        $config = new Config();
        try {
            $this->pdo = new PDO("mysql:host=" . $config->getDbHost() . ";dbname=" . $config->getDbName(), $config->getDbUserName(), $config->getDbPassword());
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}


