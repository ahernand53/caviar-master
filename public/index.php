<?php
//Desplega todos los errores en la pagina
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require '../vendor/autoload.php';

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);



use Illuminate\Database\Capsule\Manager as Capsule;
$capsule = new Capsule();

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost:3306',
    'database'  => 'caviar',
    'username'  => 'root',
    'password'  => 'Admin123!',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);
$capsule->setAsGlobal();
$capsule->bootEloquent();


$route = isset($_GET['route']) ? $_GET['route'] : '/';

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller('/', App\controllers\IndexControllers::class);

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;


