<?php namespace Montoya\BMI;

use Illuminate\Support\ServiceProvider;
use view;
class BMIServiceProvider extends ServiceProvider {

  /**
   * Indicates if loading of the provider is deferred.
   *
   * @var bool
   */
  protected $defer = false;

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {


    $this->package('montoya/bmi');
    include __DIR__ . '/routes.php';

    include __DIR__.'/Config/config.php';
    include __DIR__.'/Config/view.php';
    //$this->loadViewsFrom(__DIR__.'/../View', 'courier');
    
  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    //
    $this->app['bmi'] = $this->app->share(function($app)
      {
        return new Bmi;
      });
    $this->app->booting(function()
    {
      $loader = \Illuminate\Foundation\AliasLoader::getInstance();
      $loader->alias('bmi', 'Montoya\bmi\Facades\bmi');
    });
  }

  /**
   * Get the services provided by the provider.
   *
   * @return array
   */
  public function provides()
  {
    return array('bmi');
  }



}