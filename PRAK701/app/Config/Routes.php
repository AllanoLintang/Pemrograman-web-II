<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Buku::index', ['filter' => 'UserOnly']);
$routes->get('/buku/create', 'Buku::create', ['filter' => 'UserOnly']);
$routes->post('buku/create', 'Buku::create', ['filter' => 'UserOnly']);
$routes->get('buku/save', 'Buku::save', ['filter' => 'UserOnly']);
$routes->post('buku/save', 'Buku::save', ['filter' => 'UserOnly']);
$routes->get('buku/delete/(:num)', 'Buku::delete/$1', ['filter' => 'UserOnly']);
$routes->post('buku/delete/(:num)', 'Buku::delete/$1', ['filter' => 'UserOnly']);
$routes->get('buku/edit/(:num)', 'Buku::edit/$1', ['filter' => 'UserOnly']);
$routes->post('buku/edit/(:num)', 'Buku::edit/$1', ['filter' => 'UserOnly']);
$routes->post('buku/update/(:num)', 'Buku::update/$1', ['filter' => 'UserOnly']);
$routes->get('user/login', 'User::index');
$routes->post('user/login', 'User::index');
$routes->get('user/logout', 'User::logout');
$routes->post('user/logout', 'User::logout');