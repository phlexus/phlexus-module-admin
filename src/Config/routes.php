<?php declare(strict_types=1);

use Phalcon\Mvc\Router\Group as RouterGroup;

$routes = new RouterGroup([
    'module' => \Phlexus\Modules\BaseAdmin\Module::getModuleName(),
    'namespace' => \Phlexus\Modules\BaseAdmin\Module::getHandlersNamespace() . '\\Controllers',
    'controller' => 'index',
    'action' => 'index',
]);

$routes->addGet('/admin', [
    'controller' => 1,
    'action' => 2,
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
