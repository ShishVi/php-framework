<?php

/** @var \SimpleFramework\Application $app*/


use App\Controllers\HomeController;
use App\Controllers\UserController;

$app->router->get('/', [HomeController::class, 'index']);

$app->router->get('register', [UserController::class, 'register']);
$app->router->post('register', [UserController::class, 'store']);
$app->router->get('login', [UserController::class, 'login']);

$app->router->get('/catalog/(?P<slug>[a-z0-9-]+)/?', function(){
    return '<p>Some product</p>';
});


