<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'AuthController::home');
$routes->match(['GET', 'POST'], 'sign-in', 'AuthController::signIn');

$routes->group('dashboard', ['filter' => 'authenticationMiddleware'], function ($routes) {
    $routes->get('sign-out', 'DashboardController::signOut');
    $routes->get('/', 'DashboardController::index');
    $routes->group('pasien', function ($routes) {
        $routes->match(['GET', 'POST'], '/', 'PasienController::index');
        $routes->get('detail/(:num)', 'PasienController::detail/$1');
        $routes->get('delete/(:num)', 'PasienController::delete/$1');
    });
    $routes->match(['GET', 'POST'], 'pembayaran/(:num)', 'PasienController::pembayaran/$1');
    $routes->group('users', function ($routes) {
        $routes->get('json', 'UsersController::getUsers');
        $routes->match(['GET', 'POST'], 'list', 'UsersController::index');
        $routes->match(['GET', 'POST'], 'update/(:num)', 'UsersController::update/$1');
        $routes->get('delete/(:num)', 'UsersController::delete/$1');
    });
    $routes->group('laporan', function ($routes) {
        $routes->match(['GET', 'POST'], 'list', 'LaporanController::index');
        $routes->match(['GET', 'POST'], 'update/(:num)', 'LaporanController::update/$1');
        $routes->get('delete/(:num)', 'LaporanController::delete/$1');
        $routes->get('export/(:any)/(:any)/(:any)', 'LaporanController::export/$1/$2/$3');
    });
    $routes->group('stok', function ($routes) {
        $routes->get('json', 'StokController::getStok');
        $routes->match(['GET', 'POST'], 'list', 'StokController::index');
        $routes->match(['GET', 'POST'], 'update/(:num)', 'StokController::update/$1');
        $routes->get('delete/(:num)', 'StokController::delete/$1');
    });
});

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
