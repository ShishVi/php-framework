<?php

/** @var \SimpleFramework\Application $app*/


$app->router->add('/', function()
{return "Hello, Freinds!";}, ['get', 'post']);

$app->router->get('/test', [\App\Controllers\HomeController::class, 'test']);
$app->router->post('/contact', [\App\Controllers\ContactController::class, 'index']);


dump($app->router->getRoutes());