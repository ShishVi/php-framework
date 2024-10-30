<?php

use App\Controllers\HomeController;
/** \coreFramework\Application $app */

$app->router->add('/', function () {
    return "Hello, World!";
}, ['post', 'get']);

$app->router->get('/home', [HomeController::class, 'index']);
$app->router->post('/home/delete', [HomeController::class, 'delete']);

dump($app->router->getRoutes());

?>