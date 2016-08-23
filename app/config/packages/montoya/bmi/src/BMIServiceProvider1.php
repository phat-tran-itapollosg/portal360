<?php

namespace Montoya\BMI;

use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
class BMIServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        include __DIR__ . '/routes.php';
        //var_dump(include __DIR__.'/routes.php');
        
        //$this->package('Montoya\BMI\SRC\Views', 'bmi');
        //View::addNamespace(include __DIR__.'/View');  
        $this->register();
        $this->loadViewsFrom(__DIR__ . '/Views', 'bmi');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app['bmi']  = $this->app->share(function ($app) {
            return new bmi;
        });
    }
}
