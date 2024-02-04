<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/user', 'UserController::index');
