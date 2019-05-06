<?php declare(strict_types=1);

namespace Phlexus\Modules\Admin;

use Phalcon\DiInterface;
use Phalcon\Loader;
use Phalcon\Mvc\View\Engine\Volt;
use Phlexus\Module as PhlexusModule;

/**
 * Admin Module
 *
 * @package Phlexus\Modules\Admin
 */
class Module extends PhlexusModule
{
    /**
     * @return string
     */
    public function getHandlersNamespace(): string
    {
        return 'Phlexus\Modules\Admin';
    }

    /**
     * Registers an autoloader related to the module.
     *
     * @param DiInterface $di
     * @return void
     */
    public function registerAutoloaders(DiInterface $di = null)
    {
        $namespaces = [
            $this->getHandlersNamespace() . '\\Controllers' => __DIR__ . '/controllers/',
        ];

        $loader = new Loader();
        $loader->registerNamespaces($namespaces);
        $loader->register();
    }

    /**
     * @param DiInterface|null $di
     * @return void
     */
    public function registerServices(DiInterface $di = null)
    {
        $view = $di->getShared('view');
        $theme = $di->getShared('config')->get('theme');

        $themePath = $theme->themes_dir . $theme->theme_admin;
        $cacheDir = $theme->themes_dir_cache;

        $view->registerEngines([
            '.volt' => function ($view) use ($cacheDir, $di) {
                $volt = new Volt($view, $di);
                $volt->setOptions([
                    'path' => $cacheDir,
                ]);

                return $volt;
            }
        ]);
        $view->setMainView($themePath .  '/layouts/default');
        $view->setViewsDir($themePath . '/views/');
    }
}
