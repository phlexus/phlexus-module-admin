<?php declare(strict_types=1);

use Phalcon\Mvc\Router\Group as RouterGroup;

$routes = new RouterGroup([
    'module' => 'baseadmin',
    'controller' => 'index',
    'action' => 'index',
    'namespace' => 'Phlexus\Modules\BaseAdmin\Controllers',
]);

$routes->addGet('/admin', [
    'controller' => 'index',
    'action' => 'index',
]);

$routes->addGet('/admin/auth', [
    'controller' => 'auth',
    'action' => 'login',
]);

$routes->addPost('/admin/auth/doLogin', [
    'controller' => 'auth',
    'action' => 'doLogin',
]);

$routes->addGet('/admin/auth/remind', [
    'controller' => 'auth',
    'action' => 'remind',
]);

$routes->addGet('/admin/auth/logout', [
    'controller' => 'auth',
    'action' => 'logout',
]);

return $routes;
