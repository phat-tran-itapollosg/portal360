<?php namespace Montoya\BMI;

use Illuminate\Support\ServiceProvider;

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
    include __DIR__ . '/routes.php';

    $this->package('montoya/bmi');

    
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