<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        //panel
        $this->mapPanelRoutes();
        //auth
        $this->mapAuthRoutes();
        //almacen
        $this->mapInventoryRoutes();
        //contabilidad
        $this->mapAccountingRoutes();
        //Recursos Humanos
        $this->mapHumanResourceRoutes();
        //ventas
        $this->mapSaleRoutes();

        $this->mapApiRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPanelRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'namespace' => 'App\Http\Controllers\Panel',//$this->namespace,
        ], function ($router) {
            require base_path('routes/panel.php');
        });
    }

    protected function mapInventoryRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'prefix' => 'inventory',
            'namespace' => 'App\Http\Controllers\Inventory',//$this->namespace,
        ], function ($router) {
            require base_path('routes/inventory.php');
        });
    }

    protected function mapAccountingRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'prefix' => 'accounting',
            'namespace' => 'App\Http\Controllers\Accounting',//$this->namespace,
        ], function ($router) {
            require base_path('routes/accounting.php');
        });
    }

    protected function mapHumanResourceRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'prefix' => 'human-resource',
            'namespace' => 'App\Http\Controllers\HumanResource',//$this->namespace,
        ], function ($router) {
            require base_path('routes/human_resource.php');
        });
    }

    protected function mapSaleRoutes()
    {
        Route::group([
            'middleware' => ['web','auth'],
            'prefix' => 'sale',
            'namespace' => 'App\Http\Controllers\Sale',//$this->namespace,
        ], function ($router) {
            require base_path('routes/sale.php');
        });
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAuthRoutes()
    {
        Route::group([
            'middleware' => 'web',
            'namespace' => $this->namespace,
        ], function ($router) {
            require base_path('routes/auth.php');
        });
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::group([
            'middleware' => 'api',
            'namespace' => $this->namespace,
            'prefix' => 'api',
        ], function ($router) {
            require base_path('routes/api.php');
        });
    }
}
