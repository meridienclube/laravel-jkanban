<?php

namespace ConfrariaWeb\Jkanban\Providers;

use Illuminate\Support\ServiceProvider;

class JkanbanServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'cwjkanban');
    }

    public function register()
    {

    }

}
