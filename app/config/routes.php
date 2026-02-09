<?php

use app\controllers\AuthController;
use app\controllers\AdminController;
use app\controllers\CategoryController;
use app\middlewares\SecurityHeadersMiddleware;
use app\middlewares\AuthMiddleware;
use flight\Engine;
use flight\net\Router;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->group('', function (Router $router) use ($app) {

    // ==========================================
    // Routes pour la gestion des catégories (Admin)
    // ==========================================
    $router->group('/admin/categories', function (Router $router) use ($app) {
        
        // Liste des catégories
        $router->get('', function () use ($app) {
            $controller = new CategoryController($app);
            $controller->index();
        });

        // Formulaire de création
        $router->get('/create', function () use ($app) {
            $controller = new CategoryController($app);
            $controller->create();
        });

        // Enregistrer une nouvelle catégorie
        $router->post('/store', function () use ($app) {
            $controller = new CategoryController($app);
            $controller->store();
        });

        // Formulaire de modification
        $router->get('/edit/@id:[0-9]+', function (int $id) use ($app) {
            $controller = new CategoryController($app);
            $controller->edit($id);
        });

        // Mettre à jour une catégorie
        $router->post('/update/@id:[0-9]+', function (int $id) use ($app) {
            $controller = new CategoryController($app);
            $controller->update($id);
        });

        // Supprimer une catégorie
        $router->post('/delete/@id:[0-9]+', function (int $id) use ($app) {
            $controller = new CategoryController($app);
            $controller->delete($id);
        });
    });

}, [SecurityHeadersMiddleware::class]);
