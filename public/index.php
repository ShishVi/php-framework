<?php

use App\Controllers\HomeController;
use coreFramework\Application;

$start_time = microtime(true);


if(PHP_MAJOR_VERSION < 8) {
    die('Require PHP 8 or higher');
};

require_once __DIR__.'/../config/config.php';
require_once ROOT. '/vendor/autoload.php';
require_once ROOT. '/helpers/helpers.php';


$app = new Application;

require_once CONFIG. '/routes.php';

$app->run();

/* dump($app);
dump(request()->getMethod());
dump($app->request->isGet());
dump($app->request->isPost());
dump($app->request->isAjax());
dump(request()->get('user'));
dump($app->request->get('age'));
dump($app->request->post('user'));
dump(request()->get('users'));
 */

dump("Time: " . (microtime(true) - $start_time));

?>