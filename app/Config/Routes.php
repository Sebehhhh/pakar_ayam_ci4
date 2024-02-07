<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index');

#route user
$routes->get('/user', 'UserController::index');
$routes->get('/user/create', 'UserController::create');
$routes->post('/user/store', 'UserController::store');
$routes->get('/user/edit/(:num)', 'UserController::edit/$1');
$routes->post('/user/update/(:num)', 'UserController::update/$1');
$routes->post('/user/delete/(:num)', 'UserController::delete/$1');

#route role
$routes->get('/role', 'RoleController::index');
$routes->get('/role/create', 'RoleController::create');
$routes->post('/role/store', 'RoleController::store');
$routes->get('/role/edit/(:num)', 'RoleController::edit/$1');
$routes->post('/role/update/(:num)', 'RoleController::update/$1');
$routes->post('/role/delete/(:num)', 'RoleController::delete/$1');
