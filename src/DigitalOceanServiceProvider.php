<?php namespace Lavoaster\DigitalOcean;

use Illuminate\Foundation\Application;
use Illuminate\Support\ServiceProvider;
use Lavoaster\DigitalOcean\DigitalOcean;
use Lavoaster\DigitalOcean\Adapters\GuzzleAdapter;

class DigitalOceanServiceProvider extends ServiceProvider
{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        $this->package('lavoaster/digitalocean', 'lavoaster/digitalocean', __DIR__);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAdapters();

        $this->app['digitalocean.adapter'] = $this->app->share(
            function (Application $app) {
                return $app['digitalocean.adapters.' . $app['config']->get('lavoaster/digitalocean::adapter')];
            }
        );

        $this->app['digitalocean'] = $this->app['\Lavoaster\DigitalOcean\DigitalOcean'] = $this->app->share(
            function (Application $app) {
                return new DigitalOcean($app->make('digitalocean.adapter'));
            }
        );
    }

    public function registerAdapters()
    {
        $this->app['digitalocean.adapters.guzzle'] = $this->app->share(
            function (Application $app) {
                $guzzle = new \GuzzleHttp\Client(
                    [
                        'base_url' => [
                            $app['config']->get('lavoaster/digitalocean::url'),
                            [
                                'version' => $app['config']->get('lavoaster/digitalocean::version')
                            ]
                        ],
                        'defaults' => [
                            'headers' => [
                                'Authorization' => 'Bearer ' . $app['config']->get(
                                        'lavoaster/digitalocean::access_token'
                                    ),
                                'Accept' => 'application/json'
                            ]
                        ]
                    ]
                );

                return new GuzzleAdapter($guzzle);
            }
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array('digitalocean');
    }

}
