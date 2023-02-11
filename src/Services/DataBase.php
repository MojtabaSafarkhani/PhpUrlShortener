<?php

namespace vendor\urlshortener\Services;

use Exception;
use PDO;
use vendor\urlshortener\Config\Config;

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


