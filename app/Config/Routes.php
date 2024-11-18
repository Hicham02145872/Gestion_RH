<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('register', 'RegisterController::index');
$routes->post('register/store', 'RegisterController::store');

$routes->get('login', 'LoginController::index');
$routes->post('login/authenticate', 'LoginController::authenticate');

$routes->get('reset-password', 'ResetPasswordController::request');
$routes->post('reset-password/sendToken', 'ResetPasswordController::sendToken');
$routes->get('reset-password/(:any)', 'ResetPasswordController::reset/$1');
$routes->post('reset-password/update', 'ResetPasswordController::update');

$routes->get('candidature/(:num)', 'CandidatureController::index/$1');
$routes->get('candidature/apply/(:num)', 'CandidatureController::apply/$1');
$routes->post('submit-candidature', 'CandidatureController::submit');
$routes->get('/candidats/(:num)', 'CandidatureController::candidates/$1');
$routes->get('generate-receipt/(:num)', 'PDFController::generateReceipt/$1');

$routes->get('/', 'loading_pageController::index');

$routes->get('g_offres', 'GestionOffreController::index');
$routes->get('g_offres/create', 'GestionOffreController::create'); // To display the create form
$routes->post('g_offres/store', 'GestionOffreController::store'); // To save the new offer
$routes->get('/offres', 'OffreController::index');

$routes->get('g_offres/edit/(:num)', 'GestionOffreController::edit/$1'); // To display the edit form
$routes->post('g_offres/update/(:num)', 'GestionOffreController::update/$1'); // To update the offer
$routes->get('g_offres/delete/(:num)', 'GestionOffreController::delete/$1'); // To delete the offer

$routes->get('leave-request', 'LeaveRequestController::index');
$routes->post('leave-request/submit', 'LeaveRequestController::submit');

$routes->get('/candidats/accepter/(:num)', 'CandidatureController::accepter/$1');
$routes->get('/candidats/refuser/(:num)', 'CandidatureController::refuser/$1');








