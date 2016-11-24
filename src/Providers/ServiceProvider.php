<?php namespace %namespace%\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../../config/%packagename%.php'=>'%packagename%',
        ]);
        $this->loadMigrationsFrom( __DIR__.'/../../database/migrations' );
    }
}
