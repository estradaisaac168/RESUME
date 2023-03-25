<?php

require_once __DIR__ . '/../includes/app.php';


// Instanciando el router
use App\Router;
use Controllers\ErrorController;
use Controllers\ProfileController;

$router = new Router();

$router->get('/', [ProfileController::class, 'index']);
$router->get('/certificates', [ProfileController::class, 'certificates']);
$router->get('/contact', [ProfileController::class, 'contact']);
$router->post('/contact', [ProfileController::class, 'contact']);
$router->get('/notification', [ProfileController::class, 'notification']);


// Redireccion a errores
$router->get('/errors', [ErrorController::class, 'error404']);



// Validar que todas las rutas existan
$router->checkRoutes();