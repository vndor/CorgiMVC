<?php

if (isset($_SERVER['HTTPS'])) {
    $proto = "https";
} else {
    $proto = "http";
}

define('CORGI', array(
    "root" => __DIR__ . DIRECTORY_SEPARATOR,
    "application" => __DIR__ . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR,
    "layout" => __DIR__ . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR . 'Layouts' . DIRECTORY_SEPARATOR,
    "http" => $proto .'://'. $_SERVER['HTTP_HOST'] . DIRECTORY_SEPARATOR
));

require CORGI['application'] . 'Config.php';

if (file_exists(CORGI['root'] . 'vendor/autoload.php')) {
    require CORGI['root'] . 'vendor/autoload.php';
}

require CORGI['root'] . 'CorgiMVC.php';

$CorgiMVC = new CorgiMVC;
$CorgiMVC->loadFramework();