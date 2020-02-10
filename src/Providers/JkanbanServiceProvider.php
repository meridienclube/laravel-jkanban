<?php

namespace ConfrariaWeb\Jkanban\Providers;

use ConfrariaWeb\Jkanban\Services\KanbanBuildService;
use Illuminate\Support\ServiceProvider;

class JkanbanServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../Views', 'cwjkanban');
        $this->publishes([
            __DIR__ . '/../../public' => public_path(),
        ], 'cw_jkanban');
    }

    public function register()
    {

        $this->app->bind('KanbanBuildService', function ($app) {
            return new KanbanBuildService();
        });

    }

}
