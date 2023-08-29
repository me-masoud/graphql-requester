<?php

namespace GraphqlRequester\Factorial;
use Illuminate\Support\ServiceProvider;
class GraphqlRequesterServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Publishes the configuration file to the Laravel config directory
        $this->publishes([
            __DIR__.'/config/graphql-requester.php' => config_path('graphql-requester.php'),
        ], 'config');
    }
}