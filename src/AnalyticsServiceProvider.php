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
        $this->app->bind(AnalyticsClient::class, function (){
            $config = config('analytics');
            $api_client = $config['API_CLIENT'];
            $file_location = $api_client['key_file_location'];
            $applicationName = $api_client['application_name'];
            $scope = $api_client['scope'];
            return new AnalyticsClient($file_location, $applicationName, $scope);
        });
        $this->app->bind(Analytics::class, function (){
            $client = app(AnalyticsClient::class);
            $config = config('analytics');
            $viewId = $config["ANALYTIC"]['view_id'];
            return new Analytics($client, $viewId);
        });
        $this->publishes([
            __DIR__ . '/../config.php' => config_path('analytics.php')
        ]);
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
    }
}
