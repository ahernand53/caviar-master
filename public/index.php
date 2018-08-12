<?php
//Desplega todos los errores en la pagina
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$baseDir = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $_SERVER['SCRIPT_NAME']);
$baseUrl = 'http://' . $_SERVER['HTTP_HOST'] . $baseDir;
define('BASE_URL', $baseUrl);


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

$router->controller('/', App\controllers\IndexControllers::class);

$router->get('/menu', function () {
    return render('../resources/views/menu.twig');
});

$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], $route);

echo $response;


