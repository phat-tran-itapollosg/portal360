<?php namespace App\Modules\Alpha;

class AlphaServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		//\Log::debug("AnotherServiceProvider registered");

		// Register facades
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Entry', 'App\Modules\Alpha\Facades\EntryFacade');
		});
	}

}
