<?php namespace App\Modules\Faq;

class FaqServiceProvider extends \Illuminate\Support\ServiceProvider {

	public function register()
	{
		//\Log::debug("AnotherServiceProvider registered");

		// Register facades
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('Entry', 'App\Modules\Faq\Facades\EntryFacade');
		});
	}

}
