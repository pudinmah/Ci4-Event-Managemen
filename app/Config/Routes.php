<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Create Database
// https://codeigniter.com/user_guide/dbmgmt/forge.html#id7
$routes->get('create-db', function () {
    $forge = \Config\Database::forge();
    if ($forge->createDatabase('ci4_db')) {
        echo 'Database created!';
    }
});


$routes->get('/', 'Home::index');

// Group Gawe
$routes->group('gawe', function ($routes) {
    $routes->get('', 'Gawe::index');
    $routes->get('add', 'Gawe::create');
    $routes->post('', 'Gawe::store');
    $routes->get('edit/(:num)', 'Gawe::edit/$1');
    $routes->put('(:num)', 'Gawe::update/$1');
    $routes->delete('(:num)', 'Gawe::delete/$1');
});

