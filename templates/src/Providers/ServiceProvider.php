<?php namespace %namespace%\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use %namespace%\Http\Router;

/**
 * Class ServiceProvider
 * @author %name%
 */
class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../../config/%packagename%.php', '%packagename%');
        Router::create();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([__DIR__.'/../../config/%packagename%.php'=>config_path('%packagename%.php')], 'config');
        $this->loadMigrationsFrom( __DIR__.'/../../database/migrations' );
        $this->loadViewsFrom( __DIR__.'/../../resources/views', '%packagename%' );

        $this->loadTranslationsFrom(__DIR__.'/../../resources/lang', '%packagename%');
        $this->publishes([ __DIR__.'/../../resources/lang', resource_path( 'lang/vendor/%packagename%' ) ], 'lang');
    }
}
