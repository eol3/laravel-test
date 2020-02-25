<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        echo "ddd";
        $this->app->singleton(
			'crawler',
			function ( $app ) {
					return new \App\Services\Crawler();
			});
		$this->app->booting(
			function() {
				$loader = \Illuminate\Foundation\AliasLoader::getInstance();
				$loader->alias( 'Crawler', 'App\Services\Crawler' );
			}
		);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
