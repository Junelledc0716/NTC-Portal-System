<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'AuthController::login');
$routes->get('/login', 'AuthController::login');
$routes->post('/login', 'AuthController::loginPost');
$routes->get('/logout', 'AuthController::logout');

$routes->get('/dashboard', 'DashboardController::index');
$routes->get('/schedule', 'ScheduleController::index');
$routes->get('/examboard', 'ExamController::index');
$routes->get('/homeworks', 'HomeworkController::index');
$routes->post('/homeworks/upload/(:num)', 'HomeworkController::upload/$1');
$routes->get('/gradereport', 'GradeController::index');
$routes->get('/enrolledcourses', 'CourseController::index');
$routes->post('/enrolledcourses/add', 'CourseController::addCourse');
$routes->post('/enrolledcourses/unenroll/(:num)', 'CourseController::unenroll/$1');
$routes->get('/announcements', 'AnnouncementController::index');
$routes->get('/payment', 'PaymentController::index');
$routes->post('/payment/process', 'PaymentController::process');
$routes->get('/accountsettings', 'AccountController::index');
$routes->post('/accountsettings/update', 'AccountController::update');
$routes->post('/accountsettings/uploadpic', 'AccountController::uploadPic');