<?php

use App\Controllers\HomeController;

use App\Controllers\UserController;


/** \coreFramework\Application $app */

$app->router->add('/', function () {
    return "Hello, World!";
}, ['post', 'get']);

$app->router->get('/home', [HomeController::class, 'index']);
$app->router->post('/home/delete', [HomeController::class, 'delete']);


dump($app->router->getRoutes());


$app->router->get('/test', [UserController::class, 'test']);

$app->router->get('/post/(?P<slug>[a-z0-9-]+)', function(){
    return '<p>Какой-то пост</p>';
});

dump($app->router->getRoutes());



?>