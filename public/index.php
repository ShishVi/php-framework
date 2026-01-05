<?php

require_once __DIR__.'/../config/config.php';
require_once HELPERS . '/helpers.php';
require_once ROOT . '/vendor/autoload.php';

$start_frame = microtime(true);

$app = new \SimpleFramework\Application();

require_once CONFIG . '/routes.php';

$app->run();

if(PHP_MAJOR_VERSION < 8)
{
    die('Require PHP version >= 8');
}
//dump("Time ". microtime(true) - $start_frame);