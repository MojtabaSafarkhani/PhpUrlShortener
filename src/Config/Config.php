<?php

namespace vendor\urlshortener\Config;

class Config
{
    private const DB_NAME = "url_shortener";

    private const DB_USERNAME = "root";

    private const DB_PASSWORD = "";

    private const DB_HOST = "localhost";


    public function getDbName(): string
    {
        return self::DB_NAME;
    }

    public function getDbUserName(): string
    {
        return self::DB_USERNAME;
    }

    public function getDbPassword(): string
    {
        return self::DB_PASSWORD;
    }

    public function getDbHost(): string
    {
        return self::DB_HOST;
    }
}