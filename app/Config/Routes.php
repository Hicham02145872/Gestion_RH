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
$routes->get('send-email', 'EmailController::index');
// app/Config/Routes.php
$routes->get('candidature', 'CandidatureController::index');


$routes->post('submit-candidature', 'CandidatureController::submit');
$routes->get('generate-receipt/(:num)', 'PDFController::generateReceipt/$1');

// app/Config/Routes.php
$routes->get('/', 'loading_pageController::index');

// app/Config/Routes.php
$routes->get('g_offres', 'GestionOffreController::index');
$routes->get('g_offres/create', 'GestionOffreController::create'); // To display the create form
$routes->post('g_offres/store', 'GestionOffreController::store'); // To save the new offer

$routes->get('g_offres/edit/(:num)', 'GestionOffreController::edit/$1'); // To display the edit form
$routes->post('g_offres/update/(:num)', 'GestionOffreController::update/$1'); // To update the offer

$routes->get('g_offres/delete/(:num)', 'GestionOffreController::delete/$1'); // To delete the offer



$routes->get('leave-request', 'LeaveRequestController::index');
$routes->post('leave-request/submit', 'LeaveRequestController::submit');
$routes->get('/chatgpt', 'ChatGPTController::index');
$routes->post('chatgpt_view/generate', 'ChatGPTController::generate');


    $routes->get('gestion_employee', 'EmployeeController::index'); // List all employees
    $routes->get('gestion_employee/add', 'EmployeeController::create'); // Show Add Employee form
    $routes->post('gestion_employee/add', 'EmployeeController::add'); // Handle form submission to add employee
    $routes->get('gestion_employee/edit/(:num)', 'EmployeeController::edit/$1'); // Show Edit Employee form
    $routes->post('gestion_employee/edit/(:num)', 'EmployeeController::update/$1'); // Handle form submission to update employee
    $routes->get('gestion_employee/delete/(:num)', 'EmployeeController::delete/$1'); // Handle delete employee


