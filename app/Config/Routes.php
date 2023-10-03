<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// , ['filter' => 'authGuard'] 
$routes->get('/index', 'Home::index');
$routes->get('/home', 'UserController::index');
$routes->get('/login', 'AdminController::gotologin');
$routes->get('/register', 'AdminController::gotoregister');
$routes->get('/administrator', 'AdminController::administrator');

$routes->post('/auth_login', 'AdminController::auth_login');
$routes->post('/createaccount', 'AdminController::createaccount');
$routes->post('/submitform/(:num)', 'AdminController::submitform/$1');
$routes->post('/addproduct', 'AdminController::addproduct');
$routes->get('/deleteitem/(:num)', 'AdminController::deleteitem/$1');
$routes->get('/edititem/(:num)', 'AdminController::edititem/$1');