<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::index');
$routes->get('/login', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index');

#route user
$routes->get('/user', 'UserController::index');
$routes->post('/user/store', 'UserController::store');
$routes->post('/user/update/(:num)', 'UserController::update/$1');
$routes->get('/user/delete/(:num)', 'UserController::delete/$1');

#route role
$routes->get('/role', 'RoleController::index');
$routes->post('/role/store', 'RoleController::store');
$routes->post('/role/update/(:num)', 'RoleController::update/$1');
$routes->get('/role/delete/(:num)', 'RoleController::delete/$1');

#route gejala
$routes->get('/gejala', 'GejalaController::index');
$routes->post('/gejala/store', 'GejalaController::store');
$routes->post('/gejala/update/(:num)', 'GejalaController::update/$1');
$routes->get('/gejala/delete/(:num)', 'GejalaController::delete/$1');

#route gejala
$routes->get('/penyakit', 'PenyakitController::index');
$routes->post('/penyakit/store', 'PenyakitController::store');
$routes->post('/penyakit/update/(:num)', 'PenyakitController::update/$1');
$routes->get('/penyakit/delete/(:num)', 'PenyakitController::delete/$1');
