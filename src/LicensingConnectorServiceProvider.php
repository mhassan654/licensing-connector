<?php

namespace Mhassan654\LicensingConnector;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Mhassan654\LicensingConnector\Services\ConnectorService;
use Mhassan654\LicensingConnector\Http\Middleware\LicensingGuardMiddleware;

class LicensingConnectorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfigs();

        $this->app->singleton('licensing-connector', function () {
            return new ConnectorService();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->bootPublishes();

        $this->loadMiddlewares($router);
    }

     /**
     * Boot publishes
     */
    private function bootPublishes(): void
    {
        // configs
        $this->publishes([
            __DIR__ . '/../config/licensing-connector.php' => $this->app->configPath('licensing-connector.php'),
        ], 'license-connector-configs');
    }

    /**
     * Register package configs
     */
    private function registerConfigs(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/licensing-connector.php', 'licensing-connector');
    }

    /**
     * Load custom middlewares
     *
     * @param Router $router
     */
    private function loadMiddlewares(Router $router): void
    {
        $router->aliasMiddleware('licensing-connector', LicensingGuardMiddleware::class);
    }
}
