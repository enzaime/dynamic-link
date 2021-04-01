<?php

namespace Enzaime\DynamicLink;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider as LaravelProvider;

class ServiceProvider extends LaravelProvider
{
    protected $rootPath;

    /**
    * Register any application services.
    *
    * @return void
    */
    public function register()
    {
        $this->rootPath = realpath(__DIR__.'/../');
    }

    public function boot()
    {
        // $this->loadMigrationsFrom($this->rootPath . '/database/migrations');
        // $this->loadViewsFrom($this->rootPath . '/resources/views', PackageConst::VIEW_NAMESPACE);
        // $this->loadRoutesFrom($this->rootPath . '/routes/api.php');
        $this->mergeConfigFrom($this->rootPath . '/config/dlink.php', 'dlink');

        // Register middleware
        // Route::aliasMiddleware('my-package.middleware_name', CustomMiddleware::class);

        $this->bindViewComposer();
        $this->publishAssets();
        $this->loadCommands();

        $this->app->bind('enz_dynamic_link', DynamicLink::class);
    }

    private function bindViewComposer()
    {
        // View::composer(PackageConst::VIEW_NAMESPACE . '::*', function($view) {
        //     $view->with('viewPath', PackageConst::VIEW_NAMESPACE . '::');
        // });
    }

    private function publishAssets()
    {
        $this->publishes([
            $this->rootPath .'/config/dlink.php' => config_path('dlink.php'),
        ], 'config');
    }

    private function loadCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
            ]);
        }
    }
}
