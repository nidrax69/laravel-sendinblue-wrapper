<?php namespace Nidrax69\Sendinblue;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Config;
use Sendinblue\Mailin;

class SendinblueServiceProvider extends BaseServiceProvider {

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
		$app = app();
		$version = $app::VERSION;

		if ($version[0] == 4)
		{
			$this->package('nidrax69/sendinblue');
		}
		elseif ($version[0] == 5)
		{
			$this->publishes([
				__DIR__.'/../../config/config.php' => config_path('sendinblue.php'),
			]);
		}
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('sendinblue_wrapper', function($app) {
			$version = $app::VERSION;

			if ($version[0] == 4)
			{
				return new SendinblueWrapper();
			}
			elseif ($version[0] == 5)
			{
				return new SendinblueWrapper();
			}

		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array('sendinblue_wrapper');
	}

}
