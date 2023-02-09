<?php

use vendor\urlshortener\Controller\UrlController;
use vendor\urlshortener\Validation\UrlFormValidation;

require "../vendor/autoload.php";

$validation = new UrlFormValidation($_GET['url']);

if (!$validation->urlIsValid() || !$validation->urlLengthIsValid()) {

    $message = $validation->setMessage();

    header("Location:http://localhost/UrlShortener/?error=$message");

    exit();
}

$url_class = new UrlController();

$lastId = $url_class->insertUrl($_GET['url']);

$data = $url_class->getLastInsertedUrl($lastId);

header("Location:http://localhost/UrlShortener/?url_first=$data->source_url&url_second=$data->target_url");



