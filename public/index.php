<?php

require_once __DIR__.'/../config/config.php';
require_once HELPERS . '/helpers.php';
require_once ROOT . '/vendor/autoload.php';

$start_frame = microtime(true);

$app = new \SimpleFramework\Application();

dump($app);
dump(request()->uri);
dump(request()->getMethod());
dump(request()->isPost());
dump(request()->isGet());

dump(request()->get('age'));
dump(request()->get('name'));
dump(request()->post('name'));

if(PHP_MAJOR_VERSION < 8)
{
    die('Require PHP version >= 8');
}
dump("Time ". microtime(true) - $start_frame);