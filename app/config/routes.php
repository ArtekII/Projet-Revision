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

}, [SecurityHeadersMiddleware::class]);
