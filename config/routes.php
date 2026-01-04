<?php

/** @var \SimpleFramework\Application $app*/


$app->router->add('/', function()
{return "Hello, Freinds!";}, ['get', 'post']);

$app->router->get('/test', [\App\Controllers\HomeController::class, 'test']);
$app->router->post('/contact', [\App\Controllers\ContactController::class, 'index']);
$app->router->get('/contact', [\App\Controllers\ContactController::class, 'index']);

$app->router->get('/catalog/(?P<slug>[a-z0-9-]+)/?', function(){
    return '<p>Some product</p>';
});


