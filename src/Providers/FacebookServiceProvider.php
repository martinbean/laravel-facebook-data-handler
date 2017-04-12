<?php

namespace MartinBean\Facebook\Providers;

use Facebook\Facebook;
use Illuminate\Support\ServiceProvider;
use MartinBean\Facebook\PersistentData\LaravelSessionPersistentDataHandler;

class FacebookServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Facebook::class, function ($app) {
            return new Facebook([
                'app_id' => $this->app['config']['services.facebook.client_id'],
                'app_secret' => $this->app['config']['services.facebook.client_secret'],
                'default_graph_version' => 'v2.5',
                'persistent_data_handler' => new LaravelSessionPersistentDataHandler($app['session.store']),
            ]);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            Facebook::class,
        ];
    }
}
