<?php

use app\controllers\AuthController;
use app\controllers\AdminController;
use app\middlewares\SecurityHeadersMiddleware;
use app\middlewares\AuthMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function (Router $router) use ($app) {

    $router->get('/', function () use ($app) {
        $app->redirect('/login');
    });

    $router->get('/login', [AuthController::class, 'login']);
    $router->post('/login', [AuthController::class, 'doLogin']);
    $router->get('/logout', [AuthController::class, 'logout']);

}, [SecurityHeadersMiddleware::class]);

// Routes protégées
$router->group('', function (Router $router) {

    $router->get('/main', [AdminController::class, 'dashboard']);
    // $router->('/main/messages', [MessageController::class, 'message']);
}, [
    SecurityHeadersMiddleware::class,
    AuthMiddleware::class
]);
