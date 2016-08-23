<?php namespace Alphateam\Apollo\Facades;
 
use Illuminate\Support\Facades\Facade;
 
class Apollo extends Facade {
 
  /**
   * Get the registered name of the component.
   *
   * @return string
   */
  protected static function getFacadeAccessor() { return 'apollo'; }
 	$this->app->booting(function()
	{
	  $loader = \Illuminate\Foundation\AliasLoader::getInstance();
	  $loader->alias('Apollo', 'Alphateam\Apollo\Facades\Apollo');
	});
}