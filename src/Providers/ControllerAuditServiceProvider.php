<?php
/**
 * Logger service provider to be abled to log in different files
 *
 * @package    App\Providers
 * @author     Romain Laneuville <romain.laneuville@hotmail.fr>
 */

namespace SamJoyce777\LaravelControllerAudit\Providers;

use Illuminate\Support\ServiceProvider;
use SamJoyce777\LaravelLogger\Helper\LogToChannels;

/**
 * Class LogToChannelsServiceProvider
 *
 * @package App\Providers
 */
class ControllerAuditServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Resources/Views', 'laravel-controller-audit');

        if (! $this->app->routesAreCached()) {
            require __DIR__.'/../Http/Routes/routes.php';
        }

        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations');
    }

    /**
     * Initialize the logger
     *
     * @return void
     */
    public function register()
    {

    }
}