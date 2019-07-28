<?php

define('CORGI', array(
    "root"=> __DIR__ . DIRECTORY_SEPARATOR,
    "application"=> __DIR__ . DIRECTORY_SEPARATOR . 'application' . DIRECTORY_SEPARATOR
));

if (file_exists(CORGI['root'] . 'vendor/autoload.php')) {
    require CORGI['root'] . 'vendor/autoload.php';
}

require CORGI['root'] . 'CorgiMVC.php';

$CorgiMVC = new CorgiMVC;