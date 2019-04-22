<?php declare(strict_types=1);

use Phalcon\Mvc\Router\Group as RouterGroup;

$routes = new RouterGroup([
    'module' => 'admin',
    'controller' => 'index',
    'action' => 'index',
    'namespace' => 'Phlexus\Modules\Admin\Controllers',
]);

$routes->addGet('/admin', [
    'controller' => 'index',
    'action' => 'index',
]);

return $routes;
