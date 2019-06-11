<?php
/**
 * Created by PhpStorm.
 * User: dexterionut
 * Date: 26/07/2017
 * Time: 14:28
 */

namespace App\Modules;


use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class ModulesServiceProvider extends ServiceProvider
{

    /**
     * Will make sure that the required modules have been fully loaded
     * @return void
     */
    public function boot()
    {
        // For each of the registered modules, include their routes and Views
        $modules = config("module.modules");
        if (!$modules) {
            return;
        }
        foreach ($modules as $module) {

            // Load the routes for each of the modules
            if (file_exists(__DIR__ . '/' . $module . '/routes.php')) {
                $controllersNamespace = 'App\Modules\\' . $module . '\\' . 'Controllers';
                $routesPath = __DIR__ . '/' . $module . '/routes.php';
                Route::group([
                    'middleware' => 'api',
                    'namespace' => $controllersNamespace,
                    'prefix' => 'api'
                ], function ($router) use ($routesPath) {
                    require_once $routesPath;
                });
            }

            // Load the views
            if (is_dir(__DIR__ . '/' . $module . '/Views')) {
                $this->loadViewsFrom(__DIR__ . '/' . $module . '/Views', $module);
            }

            //Load the migrations
            if (is_dir(__DIR__ . '/' . $module . '/Migrations')) {
                $this->loadMigrationsFrom(__DIR__ . '/' . $module . '/Migrations');
            }
        }
    }


}