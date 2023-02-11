<?php

use vendor\urlshortener\Controllers\Admins\LinksController;
use vendor\urlshortener\Validations\LinksValidation;

require "../vendor/autoload.php";

$validation = new LinksValidation($_GET['url']);

if (!$validation->urlIsValid() || !$validation->urlLengthIsValid()) {

    $message = $validation->setMessage();

    header("Location:http://localhost/UrlShortener/?error=$message");

    exit();
}

$url_class = new LinksController();

$lastId = $url_class->insertUrl($_GET['url']);

$data = $url_class->getLastInsertedUrl($lastId);

header("Location:http://localhost/UrlShortener/?url_first=$data->source_url&url_second=$data->target_url");



