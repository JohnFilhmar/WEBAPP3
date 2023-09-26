<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/index', 'Home::index');
$routes->get('/home', 'UserController::index');
$routes->get('/login', 'AdminController::login');
