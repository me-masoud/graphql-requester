<?php

namespace GraphqlRequester;
class GraphqlRequesterServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes/web.php');
    }
    public function register()
    {
        $this->app->bind('factorial', function () {
            return new \GraphqlRequester\Core\Factorial();
        });
    }
}