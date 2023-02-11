<?php


namespace App\Controllers\Admins;


use PDO;
use vendor\urlshortener\Services\DataBase;


class LinksController
{
    private DataBase $db;

    public function __construct()
    {
        $this->db = new DataBase();

    }

    public function insertUrl($url)
    {
        do {
            $targetUrl = $this->randomStringGenerator();

        } while ($this->targetUrlIsExist($targetUrl));

        $statement = "INSERT INTO url(source_url,target_url) VALUE (:source_url,:target_url)";

        $sql = $this->db->pdo->prepare($statement);

        $sql->execute([
            'source_url' => $url,
            'target_url' => $targetUrl,
        ]);

        return $this->db->pdo->lastInsertId();

    }

    public function targetUrlIsExist($target): bool
    {
        $statement = "SELECT * FROM url where target_url = :target_url";

        $sql = $this->db->pdo->prepare($statement);

        $sql->execute([
            'target_url' => $target,
        ]);

        return $sql->rowCount() > 0;
    }

    public function randomStringGenerator(): string
    {
        return substr(md5(microtime()), 0, 5);
    }

    public function getLastInsertedUrl($id)
    {
        $statement = "SELECT * FROM url where id = :id";

        $sql = $this->db->pdo->prepare($statement);

        $sql->execute([
            'id' => $id,
        ]);

        return $sql->fetch(PDO::FETCH_OBJ);
    }
}