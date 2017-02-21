<?php

namespace JeroenNoten\LaravelContact;

use Illuminate\Contracts\Container\Container;
use Illuminate\Contracts\Routing\Registrar;
use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use JeroenNoten\LaravelMenu\Pages\Registrar as PageRegistrar;
use JeroenNoten\LaravelPackageHelper\ServiceProviderTraits;

class ServiceProvider extends BaseServiceProvider
{
    use ServiceProviderTraits;

    public function boot(Registrar $router)
    {
        $this->publishConfig();
        $this->loadViews();
        $this->loadTranslations();

        $this->routes($router);

        if (class_exists('JeroenNoten\\LaravelMenu\\Pages\\Registrar')) {
            PageRegistrar::register(new ContactPageProvider());
        }
    }

    public function register()
    {
        //
    }

    public function routes(Registrar $router)
    {
        $router->group([
            'namespace' => __NAMESPACE__ . '\Http\Controllers',
            'middleware' => 'web',
        ], function (Registrar $router) {
            $router->get('contact', 'ContactController@form');
            $router->post('contact', 'ContactController@send');
            $router->get('contact/success', 'ContactController@success');
        });
    }

    protected function path(): string
    {
        return __DIR__ . '/..';
    }

    protected function name(): string
    {
        return 'contact';
    }

    /**
     * Return the container instance
     *
     * @return Container
     */
    protected function getContainer()
    {
        return $this->app;
    }
}