<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//Auth 
$routes->get('/Auth', 'Auth::index');
$routes->get('/Auth/register', 'Auth::register');
$routes->post('/Auth/login', 'Auth::login');
$routes->post('/Auth/save', 'Auth::save');
$routes->get('/Auth/logout', 'Auth::logout');
//Dashboard
$routes->get('/dashboard', 'Dashboard::index');

$routes->group('',['filter' => 'AuthCheck'], function($routes){
    $routes->get('/dashboard', 'Dashboard::index');
    $routes->get('/dashboard/profile', 'Dashboard::profile');
});

$routes->group('',['filter' => 'AlreadyLoggedIn'], function($routes){
    $routes->get('/Auth', 'Auth::index');
    $routes->get('/Auth/register', 'Auth::register');
});