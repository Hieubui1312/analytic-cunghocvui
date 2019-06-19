<?php

namespace CungHocVui\Analytics;

use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class AnalyticsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind(AnalyticsClient::class);
        $this->app->bind(Analytics::class, function (){
            $client = app(AnalyticsClient::class);
            return new Analytics($client);
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
        include_once __DIR__ . "/Routes/web.php";
        include_once __DIR__ . "/config.php";
    }
}
