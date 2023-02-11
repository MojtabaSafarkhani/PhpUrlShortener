<?php

namespace vendor\urlshortener\Config;

use Exception;
use PDO;

class DataBase
{
    private string $host = 'localhost';

    private string $user = 'root';

    private string $db_name = 'url_shortener';

    private string $password = '';

    public PDO $pdo;

    public function __construct()
    {
        try {
            $this->pdo = new PDO("mysql:host=$this->host;dbname=$this->db_name", $this->user, $this->password);

            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (Exception $e) {

            echo $e->getMessage();
        }
    }
}


