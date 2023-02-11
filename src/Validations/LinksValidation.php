<?php

namespace App\Validations;

class LinksValidation
{
    public string $url;

    public string $message;

    public const URL_LENGTH = 15;

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function urlIsValid(): bool
    {

        return str_contains($this->url, "https://") || str_contains($this->url, "http://");
    }


    public function urlLengthIsValid(): bool
    {

        return strlen($this->url) > self::URL_LENGTH;
    }


    public function setMessage(): string
    {
        if (!$this->urlIsValid()) {

            $this->message = "Invalid Url";

        } elseif (!$this->urlLengthIsValid()) {

            $this->message = "Url length must be at least " . self::URL_LENGTH . " character";

        } else {

            $this->message = "";
        }

        return $this->message;
    }
}