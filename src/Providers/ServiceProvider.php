<?php namespace LasseHaslev\LaravelFieldable\Providers;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom( __DIR__.'/../../config/fieldable.php', '%packagename%');
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
