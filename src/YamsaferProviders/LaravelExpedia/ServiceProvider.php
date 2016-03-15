<?php namespace YamsaferProviders\LaravelExpedia;

use Illuminate\Foundation\AliasLoader;

class ServiceProvider extends \Illuminate\Support\ServiceProvider {

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
        // Register the package namespace
        $this->package('yamsafer-providers/laravel-expedia');

		// Auto create app alias with boot method.
		AliasLoader::getInstance()->alias('ExpediaProvider', 'YamsaferProviders\LaravelExpedia\Facade');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['yamsafer-providers.expedia'] = $this->app->share(function($app)
		{
            $config = $app->config->get('laravel-exxpedia::config', array());

			return new ExpediaProvider($config);
		});
	}

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }
}
