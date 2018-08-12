<?php
//Desplega todos los errores en la pagina
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$baseDiir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseURL = 'http://' . $_SERVER['HTTP_HOST'] . $baseDiir;
define('BASE_URL', $baseURL);


require '../vendor/autoload.php';

$route = isset($_GET['route']) ? $_GET['route'] : '/';

function render($fileName, $params = []) {
    ob_start();

    extract($params);
    include $fileName;
    return ob_get_clean();
}

use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->get('/', function () {
    return render('../resources/views/index.twig');
});

$router->get('/menu', function () {
    return render('../resources/views/menu.twig');
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;


